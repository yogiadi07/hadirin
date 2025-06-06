@extends('layout.app')

@section('content')
<a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow hover:from-blue-600 hover:to-indigo-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali ke Dashboard
</a>
<div class="px-6 py-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Kegiatan</a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-left text-sm">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama Kegiatan</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach($kegiatans as $kegiatan)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $kegiatan->nama_kegiatan }}</td>
                <td class="px-4 py-2">{{ $kegiatan->deskripsi }}</td>
                <td class="px-4 py-2">{{ $kegiatan->tanggal }}</td>
                <td class="px-4 py-2 space-x-1">
                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
