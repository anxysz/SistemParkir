<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataParkirController;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\SesiController;

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
    return view('main');
});

Route::get('/parkir', function(){
    return view('parkir.parkir');
});

Route::get('/parkir2', function(){
    return view('parkir.parkir2');
});

Route::get('/karcis', function(){
    return view('karcis.karcis');
});

Route::get('/laporan', function(){
    return view('laporan.laporan');
});

Route::get('/admin', function(){
    return view('admin.dashboard');
});

Route::get('/dataparkir', function(){
    return view('admin.data_parkir.data');
});
Route::get('/adminpage', function(){
    return view('admin.dashboard');
});

//Route::get('/admin/data_parkir/data', [DataParkirController::class, 'dataParkir'])->name('admin.data_parkir.data');

Route::get('/satpam/main', function () {
    return view('satpam.main');
})->name('satpam.main');

Route::get('/tambahdata', function(){
    return view('admin.data_parkir.tambah');
});

Route::get('/login', function(){
    return view('login.login');
});

//Route::post('/postlogin', [PostController::class])  ;

Route::get('/register', function(){
    return view('register.register');
});

Route::get('/parkir/edit', function(){
    return view('parkir.edit');
});

Route::get('/dashboard', function(){
    return view('dashboard.dashboard');
});

Route::middleware(['guest'])->group(function (){
    Route::get('/',[SesiController::class, 'index'])->name('login');
    Route::post('/',[SesiController::class, 'login']);
});
//Route::get('/',[SesiController::class, 'index']);
//Route::post('/',[SesiController::class, 'login']);
//Route::get('/login',[SesiController::class, 'logout']);

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard',[AdminController::class, 'satpam']);
    Route::get('/adm',[AdminController::class, 'admin']);
    Route::get('/logout',[SesiController::class, 'logout']);
});

Route::get('/parkir', [App\Http\Controllers\ParkirController::class, 'index'])->name('parkir');
Route::get('/parkir2', [App\Http\Controllers\ParkirController::class, 'index3'])->name('parkir');
Route::get('/parkir', [App\Http\Controllers\ParkirController::class, 'create'])->name('parkir');

Route::post('/parkir', [App\Http\Controllers\ParkirController::class, 'store'])->name('parkir');
Route::get('/karcis', [App\Http\Controllers\ParkirController::class, 'index1']);
Route::get('/laporan', [App\Http\Controllers\ParkirController::class, 'index4']);
Route::get('/laporan', [App\Http\Controllers\ParkirController::class, 'grafik']);
Route::get('/dashboard', [App\Http\Controllers\ParkirController::class, 'pie']);
// Route::get('/dashboard', [App\Http\Controllers\ParkirController::class, 'showTotalRecords']);
Route::get('/parkir/{id}/cetak', [App\Http\Controllers\ParkirController::class, 'cetak'])->name('parkir.cetak');

Route::get('/parkir/{id}/edit', [App\Http\Controllers\ParkirController::class, 'edit'])->name('parkir');
Route::put('/parkir/{id}', [App\Http\Controllers\ParkirController::class, 'update'])->name('parkir');
Route::delete('/parkir/{id}', [App\Http\Controllers\ParkirController::class, 'destroy'])->name('parkir.destroy');
Route::get('/dataparkir/create', [App\Http\Controllers\ParkirController::class, 'create2'])->name('dataparkir.create');
Route::post('/dataparkir', [App\Http\Controllers\ParkirController::class, 'store2'])->name('dataparkir.store2');
Route::get('/dataparkir', [App\Http\Controllers\ParkirController::class, 'index5']);
Route::get('/dataparkir/{id}/edit', [App\Http\Controllers\ParkirController::class, 'edit2'])->name('dataparkir.edit');
Route::put('/dataparkir/{id}', [App\Http\Controllers\ParkirController::class, 'update1'])->name('dataparkir.update');
Route::delete('/dataparkir/{id}', [App\Http\Controllers\ParkirController::class, 'destroy1'])->name('dataparkir.destroy');

Route::get('/parkir/view/pdf', [App\Http\Controllers\ParkirController::class, 'cetak_pdf'])->name('parkir.cetak_pdf');
Route::resource('parkir', ParkirController::class);