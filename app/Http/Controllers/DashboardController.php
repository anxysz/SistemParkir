<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        // Logika untuk dashboard admin
        $data = [
            'totalKendaraanParkir' => 15,
            'totalMaksimalParkir' => 20,
            'parkiran' => [
                'gkt' => [
                    'total' => 10,
                    'kapasitasMax' => 15,
                ],
                'mesin' => [
                    'total' => 8,
                    'kapasitasMax' => 10,
                ],
                'tataNiaga' => [
                    'total' => 12,
                    'kapasitasMax' => 20,
                ],
            ],
        ];

        return view('admin.dashboard', $data);
    }

    public function satpamDashboard()
    {
        // Logika untuk dashboard satpam
        $data = [
            'totalKendaraanParkir' => 15,
            'totalMaksimalParkir' => 20,
            'jumlahadminparkir' => 3,
        ];

        return view('dashboard.dashboard', $data);
    }

    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return $this->adminDashboard();
        } elseif (auth()->user()->role === 'satpam') {
            return $this->satpamDashboard();
        }

        return abort(403, 'Unauthorized');
    }
}
