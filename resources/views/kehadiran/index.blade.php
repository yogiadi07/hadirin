@extends('layout.app')

@section('content')
<a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow hover:from-blue-600 hover:to-indigo-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali ke Dashboard
</a>

<form action="{{ route('kehadiran.store') }}" method="POST" class="mb-6">
    @csrf
    <label class="block mb-2 text-sm">Masukkan ID Anggota:</label>
    <input type="text" name="id_anggota" class="w-full p-2 border rounded mb-4" placeholder="Contoh: GEN-YO-20250606-002" required>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Submit Kehadiran
    </button>
</form>

<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Daftar QR Code Kehadiran</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($anggotas as $anggota)
            <div class="border p-4 rounded shadow">
                <h2 class="font-semibold text-lg mb-2">{{ $anggota->nama_lengkap }}</h2>
                <p class="text-sm text-gray-600 mb-2">ID: {{ $anggota->id_anggota }}</p>

                <div class="flex justify-center">
                    {!! QrCode::size(150)->generate($anggota->id_anggota) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
