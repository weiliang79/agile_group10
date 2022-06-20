<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends BaseController
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
