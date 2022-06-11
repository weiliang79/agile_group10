<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Parcel;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends BaseController
{
    public function index()
    {

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if (Gate::allows('isCourier')) {
                $parcels = Parcel::where('courier_id', $user_id)
                    ->where('status', Parcel::STATUS_IN_TRANSIT)
                    ->get();
                $now = Carbon::now();
                $parcels->each(function ($parcel) use ($now) {
                    $parcel->elapsed_time = $parcel->created_at->diffInHours($now, false);
                });
                return view('courier.homepage', ['parcels' => $parcels]);
            } else if (Gate::allows('isNormalUser')) {
                //TODO: sort parrcel status by: not-dispatched->in-transit->delivered
                $parcels = Parcel::where('sender_id', $user_id)->get();
                return view('sender.homepage', compact('parcels'));
            } else if (Gate::allows('isManager')) {
                return redirect()->route('manager.tracking_in_transit');
            } else {
                return abort(404);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
