<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataParkirController;

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

// Route::get('/', function (){
//     return view('main');
// });

Route::get('/parkir', function(){
    return view('parkir.parkir');
});

Route::get('/karcis', function(){
    return view('karcis.karcis');
});

Route::get('/laporan', function(){
    return view('laporan.laporan');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/data_parkir/data', [DataParkirController::class, 'dataParkir'])->name('admin.data_parkir.data');

Route::get('/satpam/main', function () {
    return view('satpam.main');
})->name('satpam.main');