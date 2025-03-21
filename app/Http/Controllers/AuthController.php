<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index(){
        return view('Auth.login');
    }

    public function login(Request $request){
        if (Auth::attempt($request->only('email','password'))) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role === 'user') {
                return redirect('/');
            } else {
                Alert::error('Email atau Password Salah!.');
                return redirect()->back();
            }
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
