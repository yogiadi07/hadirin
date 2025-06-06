<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Karya Track</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @stack('styles')
  <style>
    .active-tab {
      border-bottom: 4px solid white;
      scale: 1.1;
    }

    .tab-button {
      position: relative;
      transition: all 0.3s ease;
    }

    .tab-button::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 50%;
      transform: translateX(-50%) scaleX(0);
      width: 100%;
      height: 3px;
      background-color: white;
      transition: transform 0.3s ease;
      transform-origin: center;
    }

    .tab-button:hover::after {
      transform: translateX(-50%) scaleX(0.5);
    }

    .tab-button.active-tab::after {
      transform: translateX(-50%) scaleX(1);
    }

    .tab-button.active-tab {
      color: white;
      transform: scale(1.1);
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Header -->
  <div class="w-full h-72 bg-gray-800 p-5 flex flex-col items-center justify-between text-white">
    <div class="w-full flex justify-between items-center">
      <div class="font-bold text-xl">Karya Track</div>
      <div class="flex gap-3">
        <!-- Bell Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white hover:scale-125 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>

        <!-- Settings Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c..."/>
        </svg>
      </div>
    </div>

    <div class="text-center mt-4">
      <img src="{{ asset('image/1725500163271.png') }}" alt="Foto Profil"
        class="w-20 h-20 mx-auto rounded-full border-2 border-white object-cover" />
      <p class="text-xl mt-2">Adhya Racing Team</p>
      <p class="font-semibold">adhyaracingteam777@gmail.com</p>
    </div>

    <div class="flex gap-6 mt-4">
      <button onclick="showTab('Tab1')" id="btnTab1"
        class="tab-button text-lg text-gray-400 hover:text-white">Tools</button>
      <button onclick="showTab('Tab2')" id="btnTab2"
        class="tab-button text-lg text-gray-400 hover:text-white">Prints</button>
      <button onclick="showTab('Tab3')" id="btnTab3"
        class="tab-button text-lg text-gray-400 hover:text-white">Info</button>
    </div>
  </div>

  <!-- Content -->
  <div class="w-full px-6 py-10 space-y-8">
    @yield('content')
  </div>

  @stack('scripts')
  <script>
    function showTab(tabId) {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
      document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active-tab'));
      document.getElementById(tabId).classList.remove('hidden');
      document.getElementById('btn' + tabId).classList.add('active-tab');
    }

    // Default aktif Tab1
    document.addEventListener('DOMContentLoaded', () => {
      showTab('Tab1');
    });
  </script>
</body>
</html>
