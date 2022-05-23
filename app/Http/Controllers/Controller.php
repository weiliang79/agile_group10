<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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
            if(Gate::allows('isSuperAdmin') || Gate::allows('isNormalUser')){
                return view('sender.home');
            } else if(Gate::allows('isCourier')){
                return view('courier.tracking');
            }
            
        } else {
            return redirect()->route('login');
        }
        
    }
    
}
