@extends('layout.app')

@section('content')
<div class="w-full px-6 py-10 space-y-8">
  <!-- Tab 1: Tools -->
  <div id="Tab1" class="tab-content grid grid-cols-2 sm:grid-cols-2 gap-6 text-white">
    <a href="{{ route('anggota.index') }}">
    <div class="bg-gray-600 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      <p class="text-sm font-semibold">Input Anggota</p>
    </div>
</a>
<a href="{{ route('kegiatan.index') }}">
    <div class="bg-gray-500 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12l-8 4-8-4m16 0L12 8m8 4v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6" />
      </svg>
      <p class="text-sm font-semibold">Input Kegiatan</p>
    </div>
</a>

<a href="{{ route('anggota.generate-id') }}">
    <div class="bg-gray-700 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14l1 9a2 2 0 01-2 2H6a2 2 0 01-2-2l1-9z" />
      </svg>
      <p class="text-sm font-semibold">Generate ID Anggota</p>
    </div>
</a>

<a href="{{ route('kehadiran.index') }}">
    <div class="bg-gray-800 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-4.418 0-4.418 8 0 8m0-8V4m0 12v4" />
      </svg>
      <p class="text-sm font-semibold">Scan Kehadiran</p>
    </div>
  </div>
</a>

  <!-- Tab 2: Karyawan -->
  <div id="Tab2" class="tab-content hidden grid grid-cols-1 gap-6 text-white">
    <a href="{{ route('print.harian') }}">
    <div class="bg-gray-700 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M12 11a4 4 0 100-8 4 4 0 000 8z" />
        </svg>
        <p class="text-sm font-semibold">Print Kehadiran Harian</p>
      </div>
    </a>
      <div class="grid grid-cols-2 gap-6">
        <a href="{{ route('print.bulanan') }}">
        <div class="bg-gray-800 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M9 13l2 2 4-4M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <p class="text-sm font-semibold">Print Kehadiran Bulanan</p>
        </div>
    </a>
    <a href="{{ route('print.anggota') }}">
        <div class="bg-gray-600 rounded-xl h-40 shadow-lg flex flex-col items-center justify-center text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 11h16M4 15h8m2 4h6a2 2 0 002-2V5a2 2 0 00-2-2h-6" />
          </svg>
          <p class="text-sm font-semibold">Print Seluruh ID Anggota</p>
        </div>
      </div>
    </a>
  </div>

  <!-- Tab 3: Info -->
  <div id="Tab3" class="tab-content hidden text-gray-700">
    <div class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-bold mb-2">Info</h2>
      <p class="text-sm">Selamat datang di Dashboard Karya Track. Silakan pilih menu yang tersedia di atas untuk mengakses fitur.</p>
    </div>
  </div>
</div>

<script>
  function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');

    document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active-tab'));
    document.getElementById('btn' + tabId).classList.add('active-tab');
  }

  // Tampilkan Tab1 sebagai default saat load
  document.addEventListener('DOMContentLoaded', function () {
    showTab('Tab1');
  });
</script>
@endsection
