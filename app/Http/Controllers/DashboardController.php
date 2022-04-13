<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Pengajar;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'data' => Portfolio::all(),
            'dataPengajar' => Pengajar::all(),
            'dataArtikel'  => Artikel::all()
        ]);
    }
}
