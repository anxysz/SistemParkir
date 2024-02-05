<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login.login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'satpam'){
                return redirect('dashboard');
            } elseif (Auth::user()->role == 'admin'){
                return redirect('admin');
            }
        } else{
            return redirect('')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('login.login');
    }

    function register(){
        Auth::logout();
        return redirect('register.register');
    }

    function create(){
        Auth::logout();
        return redirect('login.login');
    }
}
