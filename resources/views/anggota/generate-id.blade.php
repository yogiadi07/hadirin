@extends('layout.app')

@section('content')
<a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow hover:from-blue-600 hover:to-indigo-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
</a>

<div class="p-6">

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4">Generate ID Anggota</h2>

        @if(session('success'))
            <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        @if($anggotas->isEmpty())
            <p>Tidak ada anggota yang belum memiliki ID.</p>
        @else
        <table class="w-full text-left border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Lengkap</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $index => $item)
                    <tr>
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $item->nama_lengkap }}</td>
                        <td class="px-4 py-2 border">
                            @if ($item->id_anggota)
                                {{ $item->id_anggota }}
                            @else
                                <form method="POST" action="{{ route('anggota.assign-id', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Generate ID</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
