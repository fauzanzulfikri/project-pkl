<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Komputer;
use App\Models\LaporanKerusakan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_user = User::count();
        $jumlah_komputer = Komputer::count();
        $jumlah_laporan = LaporanKerusakan::count();
        return view('home.dashboard', compact(['jumlah_user','jumlah_komputer','jumlah_laporan']));
    }
}
