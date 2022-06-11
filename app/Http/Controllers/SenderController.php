<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SenderController extends BaseController
{

    public function saveParcel(Request $request)
    {
        
        $request->validate([
            'sender_address' => 'required',
            "sender_postcode" => "required",
            "recipient_firstname" => "required",
            "recipient_lastname" => "required",
            "recipient_address" => "required",
            "recipient_postcode" => "required",
            "recipient_phone" => "required",
            "weight" => "required|numeric",
        ]);

        $currentLoggedInId = Auth::user()->id;

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
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);

        $parcel->tracking_number = SenderController::generateTrackingNumber($parcel->id);
        $parcel->save();

        // redirect to homepage
        return redirect()->route('home')->with('success', 'Parcel details successfully saved.');
    }

    function generateTrackingNumber($parcelId)
    {
        return 'P' . str_pad($parcelId, 8, "0", STR_PAD_LEFT);
    }

}
