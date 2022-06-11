<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LandingController extends BaseController
{
    public function index(){
        if(Auth::check()){
            if(Gate::allows('isManager')){
                return redirect()->route('manager.home');
            } else if(Gate::allows('isCourier')){
                return redirect()->route('courier.home');
            } else if(Gate::allows('isNormalUser')){
                return redirect()->route('normal_user.home');
            } else {
                return redirect()->back()->with('error', 'System has occurred error, please contact system admin for further support.');
            }
        }
        return view('landing.landing_page');
    }

    public function tracking(Request $request){
        //dd($request);

        if(!is_null($request->tracking_number)){

            $parcelQuery = Parcel::where('tracking_number', $request->tracking_number)->get();

            if($parcelQuery->count() == 1){
                $parcel = $parcelQuery->first();

                $parcelDetails = $parcel->details()->orderBy('status', 'DESC')->get();
                //dd($parcelDetails);

                return view('landing.tracking_page', compact('parcel', 'parcelDetails'));
            }

        }

        return redirect()->route('landing')->with('error', 'Tracking number no entered or is invalid.');
    }
}
