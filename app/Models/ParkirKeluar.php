<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkirKeluar extends Model
{
    public $table = "parkirkeluar";
    protected $fillable = ['kode_karcis', 'nomor_plat', 'jenis', 'waktu_masuk', 'waktu_keluar','penjaga','lokasi'];
    //protected $fillable = ['nomor_plat', 'jenis_kendaraan'];
    //protected $fillable = ['kode_karcis','nomor_plat','jenis', 'waktu_masuk','waktu_keluar','penjaga','lokasi',];
    public $timestamps = false;
}
