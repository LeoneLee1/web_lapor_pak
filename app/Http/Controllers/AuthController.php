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
                toast('Berhasil masuk akun!','success');
                return redirect('/admin');
            } elseif (Auth::user()->role === 'user') {
                toast('Berhasil masuk akun!','success');
                return redirect('/');
            } else {
                Alert::error('Email atau Password Salah!.');
                return redirect()->back();
            }
        }
    }

    public function register(){
        return view('Auth.register');
    }

    public function register_process(Request $request){
        //
    }

    public function forgot_password(){
        return view('Auth.forgot_password');
    }

    public function forgot_password_process(Request $request){
        //
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
