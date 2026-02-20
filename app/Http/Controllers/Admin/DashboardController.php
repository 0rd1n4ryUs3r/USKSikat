<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonMaba;
use App\Models\SoalTest;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index()
    {
        $totalPendaftar = CalonMaba::count();
        $totalLulus = CalonMaba::where('status_test', 'lulus')->count();
        $totalDaftarUlang = CalonMaba::where('status_daftar_ulang', 'lengkap')->count();
        $totalSoal = SoalTest::count();

        return view('admin.dashboard', compact(
            'totalPendaftar',
            'totalLulus',
            'totalDaftarUlang',
            'totalSoal'
        ));
    }
}
