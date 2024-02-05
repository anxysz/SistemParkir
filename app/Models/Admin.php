<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = "lokasi";
    protected $fillable = ['parkiran', 'kapasitas'];
    public $timestamps = false;
    protected $primaryKey = 'id_lokasi';
}
