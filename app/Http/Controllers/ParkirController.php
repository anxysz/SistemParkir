<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Parkir;
use App\Models\ParkirKeluar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class ParkirController extends Controller
{
    // public function showTotalRecords()
    // {
    //     // Retrieve the total number of records in the 'parkir' table
    //     $totalRecords = Parkir::count();

    //     // Pass the totalRecords variable to your view
    //     return view('dashboard.dashboard', compact('totalRecords'));
    // }

    public function index()
    {
        //dd(Parkir::get());
        return view('parkir.parkir', [
            'parkirs' => Parkir::get(),
        ]);
    }

    public function cetak($id)
    {
        //dd(Parkir::get());
        $parkir = Parkir::find($id);

        return view('parkir.cetak', [
            'parkir' => $parkir,
        ]);
    }

    public function index3()
    {
        //dd(Parkir::get());
        return view('parkir.parkir2', [
            'parkirs' => Parkir::get(),
        ]);
    }

    public function index1()
    {
        //dd(Parkir::get());
        return view('karcis.karcis', [
            'parkirs' => Parkir::get(),
        ]);
    }

    public function index4()
    {
        //dd(Parkir::get());
        return view('laporan.laporan', [
            'parkirKeluar' => ParkirKeluar::get(),
        ]);
    }

    public function index5()
    {
        //dd(Parkir::get());
        return view('admin.data_parkir.data', [
            'admins' => Admin::get(),
        ]);
    }

    public function create()
    {
        //dd(Parkir::get());
        return view('parkir.parkir');
    }

    public function store(Request $request)
    {
        //dd('P');
        $parkir = new Parkir();

        $parkir->kode_karcis = rand(1000, 9999); // Generate a random 4-character int
        $parkir->nomor_plat = $request->nomor_plat;
        $parkir->jenis = $request->jenis_kendaraan;
        $parkir->waktu_masuk = Carbon::now('Asia/Jakarta');
        $parkir->penjaga = 'Suripto'; // Set penjaga to 'Suripto'
        $parkir->lokasi = 'Elektro'; // Set lokasi to 'Elektro'

        $parkir->save();
        return redirect('parkir')->with('message', 'Input Parkir Berhasil!');
    }

    public function edit($id)
    {
        //dd(Parkir::get());
        $parkir = Parkir::find($id);

        return view('parkir.edit', [
            'parkir' => $parkir,
        ]);
    }

    public function destroy($id)
    {
        
        //dd(Parkir::get());
        $parkir = Parkir::find($id);

        // Create a new record in the ParkirKeluar table
        $parkirKeluar = new ParkirKeluar();
        $parkirKeluar->kode_karcis = $parkir->kode_karcis;
        $parkirKeluar->nomor_plat = $parkir->nomor_plat;
        $parkirKeluar->jenis = $parkir->jenis;
        $parkirKeluar->waktu_masuk = $parkir->waktu_masuk;
        $parkirKeluar->waktu_keluar = Carbon::now('Asia/Jakarta'); // Set waktu_keluar to current timestamp in Indonesia time zone
        $parkirKeluar->penjaga = $parkir->penjaga;
        $parkirKeluar->lokasi = $parkir->lokasi;
        $parkirKeluar->save();

        //Delete the record from the Parkir table
        $parkir->delete();

        return redirect('laporan')->with('message', 'Input Parkir Berhasil!');
    }

    public function update(Request $request,$id)
    {
        //dd('P');
        $parkir = Parkir::find($id);

        $parkir->kode_karcis = $request->kode_karcis;
        $parkir->nomor_plat = $request->nomor_plat;
        $parkir->jenis = $request->jenis;
        $parkir->waktu_masuk = $request->waktu_masuk;
        $parkir->penjaga = $request->penjaga;
        $parkir->lokasi = $request->lokasi;

        $parkir->save();
        return redirect('parkir')->with('message', 'Input Parkir Berhasil!');
    }

    public function create2()
    {
        //dd(Parkir::get());
        return view('admin.data_parkir.tambah');
    }

    public function store2(Request $request)
    {
        //dd('P');
        $tambah = new Admin();

        $tambah->parkiran = $request->parkiran;
        $tambah->kapasitas = $request->kapasitas;

        $tambah->save();
        return redirect('dataparkir')->with('message', 'Input Parkir Berhasil!');
    }

    public function edit2($id)
    {
        $tambah = Admin::find($id);

        return view('admin.data_parkir.edit', [
            'tambah' => $tambah,
        ]);
        //dd(Admin::get());
        //$parkir = Parkir::find($id);

        //return view('parkir.edit', [
            //'parkir' => $parkir,
        //]);
    }

    public function update1(Request $request,$id)
    {
        //dd('P');
        $tambah = Admin::find($id);

        $tambah->parkiran = $request->parkiran;
        $tambah->kapasitas = $request->kapasitas;
    
        $tambah->save();
        return redirect('dataparkir')->with('message', 'Input Parkir Berhasil!');
    }

    public function destroy1($id)
    {
        
        //dd(Parkir::get());
        $tambah = Admin::find($id);

        $tambah->delete();

        return redirect('dataparkir')->with('message', 'Input Parkir Berhasil!');
    }

    public function cetak_pdf(){
        $parkirKeluar['parkirKeluar'] = ParkirKeluar::all();

        $pdf = Pdf::loadView('parkir.cetak_pdf', $parkirKeluar)->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Parkir.pdf');
    }

    public function grafik(){
        $totalsPerDay = ParkirKeluar::select(
        DB::raw("DAYNAME(waktu_keluar) as harian"),
        DB::raw("COUNT(CASE WHEN jenis = 'motor' THEN 1 END) as total_motor"),
        DB::raw("COUNT(CASE WHEN jenis = 'mobil' THEN 1 END) as total_mobil")
        )
        ->groupBy(DB::raw("DAYNAME(waktu_keluar)"))
        ->get();
        
        $hari = Parkir::select(DB::raw("DAYNAME(waktu_keluar) as hari"))
        ->GroupBy(DB::raw("DAYNAME(waktu_keluar)"))
        ->pluck('hari');
        
        
        return view('laporan.laporan', [
            'totalsPerDay' => $totalsPerDay,
            'parkirKeluar' => ParkirKeluar::get(),
        ], compact('hari'));
    }

    public function pie()
    {
        $totalMotor = Parkir::where('jenis', 'motor')->count();
        $totalMobil = Parkir::where('jenis', 'mobil')->count();

        $totalRecords = Parkir::count();

        return view('dashboard.dashboard', [
            'parkir' => Parkir::get(),
            'totalMotor' => $totalMotor,
            'totalMobil' => $totalMobil,
            'totalRecords' => $totalRecords,
        ]);
    }

}
