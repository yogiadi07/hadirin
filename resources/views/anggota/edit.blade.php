@extends('layout.app')

@section('content')
<a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow hover:from-blue-600 hover:to-indigo-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
</a>
<div class="px-6 py-4">
    <h1 class="text-xl font-bold mb-4">Edit Anggota</h1>
    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="space-y-4 bg-white p-4 rounded shadow">
        @method('PUT')
        @include('anggota.form')
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</div>
@endsection
