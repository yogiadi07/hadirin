<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Anggota;
use Carbon\Carbon;

class PrintController extends Controller
{
    public function harian()
    {
        $today = Carbon::today()->toDateString();
        $data = Kehadiran::whereDate('created_at', $today)->with('anggota')->get();

        return view('print.harian', compact('data', 'today'));
    }

    public function bulanan()
    {
        $bulanIni = Carbon::now()->format('Y-m');
        $data = Kehadiran::where('created_at', 'like', "$bulanIni%")->with('anggota')->get();

        return view('print.bulanan', compact('data', 'bulanIni'));
    }

    public function anggota()
    {
        $data = Anggota::all();
        return view('print.anggota', compact('data'));
    }
}

