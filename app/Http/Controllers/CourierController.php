<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Parcel;
use App\Models\ParcelDetails;
use App\Models\ParcelRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PDO;

class CourierController extends BaseController
{

    public function index()
    {
        if (Gate::allows('isCourier')) {
            $parcels = Parcel::where('courier_id', Auth::user()->id)
                ->where('status', Parcel::STATUS_IN_TRANSIT)
                ->get();
            $now = Carbon::now();
            $parcels->each(function ($parcel) use ($now) {
                $parcel->elapsed_time = $parcel->created_at->diffInHours($now, false);
            });
            return view('courier.homepage', ['parcels' => $parcels]);
        }
        abort(403);
    }

    public function updateParcel(Request $request)
    {
        //dd($request);

        $request->validate([
            'tracking_number' => 'required|regex:/^[P]/|min:9|max:9',
        ]);

        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();

        if ($parcel === null) {
            return redirect()->back()->with('error', "The tracking number not found!");
        }

        //dd($parcel);
        if ($parcel->status == Parcel::STATUS_NOT_PICK_UP) {
            $parcel->status = Parcel::STATUS_NOT_DISPATCHED;
            $parcel->courier_id = Auth::user()->id;
            $parcel->details()->create([
                'status' => Parcel::STATUS_IN_TRANSIT,
                'message' => 'Courier has been assigned to handle the parcel.',
            ]);
            $parcel->save();
            return redirect()->back()->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to not dispatched status.');
        } else if ($parcel->status == Parcel::STATUS_NOT_DISPATCHED) {
            $parcel->status = Parcel::STATUS_IN_TRANSIT;
            $parcel->courier_id = Auth::user()->id;
            $parcel->details()->create([
                'status' => Parcel::STATUS_IN_TRANSIT,
                'message' => 'Parcel is in transit.',
            ]);
            $parcel->save();
            return redirect()->back()->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to in-transit status.');
        } else if ($parcel->status == Parcel::STATUS_IN_TRANSIT) {
            //TODO: change status from in-transit to delivered
            //return view('courier.delivery_screen')->with('tracking_number', $parcel->tracking_number);
            return redirect()->route('courier.deliver_screen', compact('parcel'));
        } else if ($parcel->status == Parcel::STATUS_DELIVERED) {
            return redirect()->back()->with('error', 'The parcel ' . $parcel->tracking_number . ' are delivered.');
        } else {
            return redirect()->back()->with('error', 'The parcel ' . $parcel->tracking_number . ' status are not correct.');
        }
    }

    public function deliverScreen(Request $request)
    {
        //dd($request);

        $parcel = Parcel::where('tracking_number', $request->parcel)->first();
        if ($parcel === null) {
            return redirect()->route('courier.home')->with('error', "The tracking number not found!");
        }

        return view('courier.delivery_screen', compact('parcel'));
    }

    public function deliverScreenSubmit(Request $request)
    {
        //dd($request);
        $request->validate([
            "tracking_number" => "required|regex:/^[P]/|min:9|max:9",   // copy from updateParcel
            "receiver_name" => "required",
            "signature" => "required",
            "location" => "required",
        ]);

        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();
        $parcel->status = Parcel::STATUS_DELIVERED;
        $parcel->receiver_name = $request->receiver_name;
        $parcel->signature = $request->signature;
        $parcel->details()->create([
            'status' => Parcel::STATUS_DELIVERED,
            'message' => 'Parcel Delivered.',
            'location' => $request->location,
        ]);
        $parcel->save();
        return redirect()->route('courier.home')->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to delivered status.');
    }

    public function trackingPage(Request $request)
    {
        $parcels = Parcel::where('courier_id', auth()->user()->id)->where('status', Parcel::STATUS_IN_TRANSIT)->get();


        return view('courier.tracking_page', compact('parcels'));
    }

    public function parcelRequestList()
    {
        $parcelRequests = ParcelRequest::where('courier_id', auth()->user()->id)
            ->where('status', ParcelRequest::STATUS_PENDING)->get();
        // dd($parcelRequest->all());
        return view('courier.parcel_request', compact('parcelRequests'));
    }

    public function parcelRequestRespond(Request $request)
    {
        $request->validate([
            'action' => 'required',
            'request_id' => 'required|numeric'
        ]);
        $parcelRequest = ParcelRequest::find($request->request_id);
        if ($parcelRequest->status != ParcelRequest::STATUS_PENDING) {
            return redirect()->back();
        }
        if ($request->action == 'accept') {
            $parcelRequest->status = ParcelRequest::STATUS_ACCEPT;
        } else if ($request->action == 'reject') {
            $parcelRequest->status = ParcelRequest::STATUS_DECLINE;
        }
        $parcelRequest->save();
        return redirect()->back();
    }
}
