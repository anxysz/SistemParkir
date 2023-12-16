<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataParkirModel extends Model
{
    protected $table = 'data_parkir';

    protected $fillable = [
        'lokasi_parkir',
        'kapasitas',
        'aksi',
    ];
}
