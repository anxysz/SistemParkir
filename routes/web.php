<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome', ['title' => 'Sistem Parkir']);
//});

Route::get('/', function (){
    return view('home');
});

Route::get('/parkir', function(){
    return view('parkir.parkir');
});

Route::get('/karcis', function(){
    return view('karcis.karcis');
});

Route::get('/laporan', function(){
    return view('laporan.laporan');
});