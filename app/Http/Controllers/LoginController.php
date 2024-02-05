<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postlogin (Request $request){
    dd($request->all());
    //if(Auth::attempt($request->only('email','password'))){
       // return redirect('dashboard.dashboard');
   // }
   // return redirect ('login');
}
}
