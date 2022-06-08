<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\ParcelDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller
{
    public function updateParcel(Request $request)
    {
        //dd($request);

        $request->validate([
            'tracking_number' => 'required|regex:/^[P]/|min:9|max:9',
        ]);

        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();

        if($parcel === null){
            return redirect()->back()->with('error', "The tracking number not found!");
        }

        //dd($parcel);

        if ($parcel->status == Parcel::STATUS_NOT_DISPATCHED) {
            $parcel->status = Parcel::STATUS_IN_TRANSIT;
            $parcel->courier_id = Auth::user()->id;
            $parcel->save();
            return redirect()->back()->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to in-transit status.');
        } else if ($parcel->status == Parcel::STATUS_IN_TRANSIT) {
            //TODO: change status from in-transit to delivered
            //return view('courier.delivery_screen')->with('tracking_number', $parcel->tracking_number);
            return redirect()->route('courier.deliver_screen', compact('parcel'));
        } else if($parcel->status == Parcel::STATUS_DELIVERED){
            return redirect()->back()->with('error', 'The parcel ' . $parcel->tracking_number . ' are delivered.');
        } else {
            return redirect()->back()->with('error', 'The parcel ' . $parcel->tracking_number . ' status are not correct.');
        }
    }

    public function deliverScreen(Request $request){
        //dd($request);

        $parcel = Parcel::where('tracking_number', $request->parcel)->first();
        if($parcel === null){
            return redirect()->route('home')->with('error', "The tracking number not found!");
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
        $parcel->save();
        $parcel_details = new ParcelDetails;
        $parcel_details->location = $request->location;
        $parcel_details->parcel_id = $parcel->id;
        $parcel_details->save();
        return redirect()->route('home')->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to delivered status.');
    }

    public function trackingPage (Request $request){
        $parcels = Parcel::where('courier_id', auth()->user()->id) -> where('status', Parcel::STATUS_IN_TRANSIT)->get();

    
        return view('courier.tracking_page', compact('parcels')) ;
    }



}
