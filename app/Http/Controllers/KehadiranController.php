<?php

namespace App\Http\Controllers;
use App\Models\Kehadiran;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KehadiranController extends Controller
{


public function index()
{
    $anggotas = Anggota::all();
    return view('kehadiran.index', compact('anggotas'));
}


    public function store(Request $request)
{
    $request->validate([
        'id_anggota' => 'required|exists:anggotas,id',
    ]);

    $tanggal = now()->toDateString();

    $existing = Kehadiran::where('id_anggota', $request->id_anggota)
                         ->where('tanggal', $tanggal)
                         ->first();

    if ($existing) {
        return back()->with('success', 'Kehadiran sudah tercatat hari ini.');
    }

    Kehadiran::create([
        'id_anggota' => $request->id_anggota,
        'tanggal' => $tanggal,
        'jam_masuk' => now()->format('H:i:s'),
    ]);

    return back()->with('success', 'Kehadiran berhasil dicatat!');
}


}