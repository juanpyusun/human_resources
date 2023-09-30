<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        //valida que venga email y password
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //conserva unicamente email y password en credentials, omite otros campos como token
        $credentials = $request->only('email', 'password'); 

        if(Auth::attempt($credentials)){
            return redirect()->route('employees.index');
        }
        return redirect('/'); //dentro del redirect lo toma como url('/')
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

}
