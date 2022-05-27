<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\ParcelDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class ParcelController extends Controller
{
    public function sendParcel(Request $request)
    {
        $request->validate([
            "sender_postcode" => "required",
            "recipient_firstname" => "required",
            "recipient_lastname" => "required",
            "recipient_address" => "required",
            "recipient_postcode" => "required",
            "recipient_phone" => "required",
            "weight" => "required|numeric",
        ]);

        $currentLoggedInId = Auth::user()->id;

        /*$parcel = new Parcel;
        $parcel->tracking_number = 0;
        $parcel->weight = $request->weight;
        $parcel->sender_id = $currentLoggedInId;
        $parcel->sender_address = $request->sender_address;
        $parcel->sender_postcode = $request->sender_postcode;
        $parcel->recipient_firstname = $request->recipient_firstname;
        $parcel->recipient_lastname = $request->recipient_lastname;
        $parcel->recipient_address = $request->recipient_address;
        $parcel->recipient_postcode = $request->recipient_postcode;
        $parcel->recipient_phone = $request->recipient_phone;
        $parcel->status = Parcel::STATUS_PENDING;*/

        //$parcel->save();

        $parcel = Parcel::create([
            'weight' => $request->weight,
            'sender_id' => $currentLoggedInId,
            'sender_address' => $request->sender_address,
            'sender_postcode' => $request->sender_postcode,
            'recipient_firstname' => $request->recipient_firstname,
            'recipient_lastname' => $request->recipient_lastname,
            'recipient_address' => $request->recipient_address,
            'recipient_postcode' => $request->recipient_postcode,
            'recipient_phone' => $request->recipient_phone,
            'status' => Parcel::STATUS_PENDING,
        ]);

        $parcel->tracking_number = ParcelController::generateTrackingNumber($parcel->id);
        $parcel->save();

        // redirect to homepage
        return redirect()->route('root')->with('success', 'Parcel details successfully saved.');
    }

    public function updateParcel(Request $request)
    {
        //dd($request);

        $request->validate([
            'tracking_number' => 'required|regex:/^[#]/|min:9|max:9',
        ]);

        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();

        //dd($parcel);

        if ($parcel->status == Parcel::STATUS_PENDING) {
            $parcel->status = Parcel::IN_TRANSIT;
            $parcel->courier_id = Auth::user()->id;
            $parcel->save();
            return redirect()->back()->with('success', 'The parcel ' . $parcel->tracking_number . ' has updated to in-transit status.');
        } else if ($parcel->status == Parcel::IN_TRANSIT) {
            //TODO: change status from in-transit to delivered
            return view('courier.delivery_screen')->with('tracking_number', $parcel->tracking_number);
        }
    }

    public function deliveredParcel(Request $request)
    {
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


    function generateTrackingNumber($parcelId)
    {
        return '#' . str_pad($parcelId, 8, "0", STR_PAD_LEFT);
    }
}
