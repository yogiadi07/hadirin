<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $fillable = ['id_anggota', 'tanggal', 'jam_masuk'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    
    public function show($id_anggota)
{
    $anggota = Anggota::where('id_anggota', $id_anggota)->firstOrFail();
    return view('kehadiran.show', compact('anggota'));
}

}
