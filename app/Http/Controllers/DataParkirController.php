<?php

namespace App\Http\Controllers;

use App\Models\DataParkirModel;
use Illuminate\Http\Request;

class DataParkirController extends Controller
{
    public function dataParkir()
    {
        $dataParkir = DataParkirModel::all(); 

        return view('admin.data_parkir.data', compact('dataParkir'));
    }
}
