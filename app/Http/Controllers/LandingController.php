<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends BaseController
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('landing.landing_page');
    }
}
