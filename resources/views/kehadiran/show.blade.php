@extends('layouts.app')

@section('content')
    <h1>QR Code Kehadiran untuk {{ $anggota->nama_lengkap }}</h1>

    <div>
        {!! QrCode::size(200)->generate($anggota->id_anggota) !!}
    </div>

    <p>ID Anggota: {{ $anggota->id_anggota }}</p>
@endsection
