<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'email' => 'required|email|unique:anggotas',
            'no_hp' => 'required',
            
        ]);
    
        // Jangan isi id_anggota saat create anggota
        Anggota::create($validated);
    
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }
    
    
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'email' => 'required|email|unique:anggotas,email,' . $anggota->id,
            'no_hp' => 'required',
        ]);

        $anggota->update($validated);
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus');
    }


    public function generateId()
    {
        $anggotas = Anggota::whereNull('id_anggota')->get();
        return view('anggota.generate-id', compact('anggotas'));
    }    


    public function generateCustomId($nama, $urutan)
    {
        $initials = strtoupper(Str::substr(Str::slug($nama, ''), 0, 2));
        $date = Carbon::now()->format('Ymd');
        $urutFormatted = str_pad($urutan, 3, '0', STR_PAD_LEFT);

        return 'GEN-' . $initials . '-' . $date . '-' . $urutFormatted;
    }
    
    public function assignCustomId($id)
{
    $anggota = Anggota::findOrFail($id);

    // Hitung total ID yang sudah dibuat
    $urutan = Anggota::whereNotNull('id_anggota')->count() + 1;
    $customId = $this->generateCustomId($anggota->nama_lengkap, $urutan);

    $anggota->update(['id_anggota' => $customId]);

    return redirect()->route('anggota.generate-id')->with('success', 'ID berhasil digenerate untuk ' . $anggota->nama_lengkap);
}

public function assignId(Request $request, Anggota $anggota)
{
    if (!$anggota->id_anggota) {
        $today = \Carbon\Carbon::today();
        $urutan = \App\Models\Anggota::whereDate('created_at', $today)->count() + 1;

        $id_anggota = $this->generateCustomId($anggota->nama_lengkap, $urutan);

        $anggota->update([
            'id_anggota' => $id_anggota
        ]);

        return redirect()->back()->with('success', 'ID berhasil digenerate');
    }

    return redirect()->back()->with('success', 'ID sudah ada dan tidak diubah');
}


}
