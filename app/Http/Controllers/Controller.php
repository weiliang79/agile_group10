<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function root(){
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if(Gate::allows('isSuperAdmin') || Gate::allows('isNormalUser')){
                //TODO: sort parrcel status by: pending->delivering->delivered
                $parcels = Parcel::where('sender_id', Auth::user()->id)->get();
                return view('sender.homepage', compact('parcels'));
            } else if(Gate::allows('isCourier')){
                $parcels = Parcel::where('courier_id', $user_id)->get();
                $now = Carbon::now();
                $parcels->each(function ($parcel) use ($now) {
                    $parcel->elapsed_time = $parcel->created_at->diffInHours($now, false);
                });
                return view('courier.homepage', ['parcels' => $parcels]);
            }
            
        } else {
            return redirect()->route('login');
        }
        
    }
    
}
