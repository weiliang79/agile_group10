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
            'tracking_number' => 'required|regex:/^[#]/|min:9|max:9',
        ]);

        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();

        //dd($parcel);

        if ($parcel->status == Parcel::STATUS_PENDING) {
            $parcel->status = Parcel::STATUS_IN_TRANSIT;
            $parcel->courier_id = Auth::user()->id;
            $parcel->save();
            return redirect()->back()->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to in-transit status.');
        } else if ($parcel->status == Parcel::STATUS_IN_TRANSIT) {
            //TODO: change status from in-transit to delivered
            return view('courier.delivery_screen')->with('tracking_number', $parcel->tracking_number);
        }
    }

    public function deliverParcel(Request $request)
    {
        $request->validate([
            "tracking_number" => "required|regex:/^[#]/|min:9|max:9",   // copy from updateParcel
            "recipient_name" => "required",
            "signature" => "required",
            "location" => "required",
        ]);

        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();
        $parcel->status = Parcel::STATUS_DELIVERED;
        $parcel->recipient_name = $request->recipient_name;
        $parcel->signature = $request->signature;
        $parcel->save();
        $parcel_details = new ParcelDetails;
        $parcel_details->location = $request->location;
        $parcel_details->parcel_id = $parcel->id;
        $parcel_details->save();
        return redirect()->route('root');
    }
}
