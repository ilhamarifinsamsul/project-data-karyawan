<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departement;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKaryawan = Karyawan::count();
        $totalDepartement = Departement::count();

        return view('pages.dashboard.index', [
            'totalKaryawan' => $totalKaryawan,
            'totalDepartement' => $totalDepartement
        ]);
    }
}
