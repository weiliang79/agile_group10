<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function process(Request $request){
        //dd($request);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('email', 'password'))){
            return redirect()->back()->with('error', "Wrong E-mail or Password! Please Try Again!");
        }

        return redirect()->route('home');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerProcess(Request $request){
        //dd($request);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'phone' => 'required|numeric',
        ]);

        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);

        $user->role()->associate(Role::ROLE_NORMAL_USER);

        $user->save();

        return redirect()->route('login');
    }

    public function destory(){
        Auth::logout();
        return redirect()->route('login');
    }

}
