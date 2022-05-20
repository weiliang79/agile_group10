<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            "weight" => "required",
        ]);

        $currentLoggedInId = Auth::user()->id;

        $parcel = new Parcel;
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
        $parcel->status = 0;

        $parcel->save();

        // redirect to homepage
        return redirect()->route('root');
    }
}
