<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    public $table = "parkir";
    protected $fillable = ['nomor_plat', 'jenis_kendaraan'];
    //protected $fillable = ['kode_karcis','nomor_plat','jenis', 'waktu_masuk','waktu_keluar','penjaga','lokasi',];
    public $timestamps = false;
}
