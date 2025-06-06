@extends('layout.app')

@section('content')
<a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow hover:from-blue-600 hover:to-indigo-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali ke Dashboard
</a>
<div class="p-6">
  <h1 class="text-xl font-bold mb-4">Daftar ID Seluruh Anggota</h1>
  <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">Print</button>

  <table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
      <tr>
        <th class="border px-4 py-2">No</th>
        <th class="border px-4 py-2">Nama</th>
        <th class="border px-4 py-2">Asal</th>
        <th class="border px-4 py-2">Jabatan</th>
        <th class="border px-4 py-2">No WA</th>
        <th class="border px-4 py-2">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $index => $anggota)
        <tr>
          <td class="border px-4 py-2">{{ $index + 1 }}</td>
          <td class="border px-4 py-2">{{ $anggota->nama_lengkap }}</td>
          <td class="border px-4 py-2">{{ $anggota->asal_pikr }}</td>
          <td class="border px-4 py-2">{{ $anggota->jabatan_di_pikr }}</td>
          <td class="border px-4 py-2">{{ $anggota->no_wa }}</td>
          <td class="border px-4 py-2">{{ $anggota->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
