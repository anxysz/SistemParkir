<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function satpam(){
        return view('dashboard.dashboard');
    }

    function admin(){
        return view('admin.admdashboard');
    }
}
