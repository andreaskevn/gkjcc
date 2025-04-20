<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKJCC | Dashboard</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@heroicons/react/outline" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex min-h-screen relative">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 bg-gray-900 text-white w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
            <x-sidebar></x-sidebar>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:ml-64">
            <!-- Header -->
            <header
                class="bg-white shadow-md p-4 flex justify-between items-center md:hidden fixed top-0 left-0 right-0 z-40">
                <button id="hamburger" class="text-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">GKJCC | Dashboard</h1>
                <div class="relative" x-data="{ open: false }">
                    <!-- Tombol Profile -->
                    <button @click="open = !open"
                        class="flex items-center px-4 py-2 bg-white rounded-lg shadow font-poppins space-x-3">
                        <img src="{{ asset('putin.jpeg') }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                        <div class="ml-3 text-left">
                            {{-- <p class="font-bold">{{ Auth::user()->name }}</p>
                            <p class="font-semibold">{{ Auth::user()->role->nama_role }}</p> --}}
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5 ml-2 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Menu Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <!-- Link Profile -->
                        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            Profile
                        </a>
                        <!-- Tombol Log Out -->
                        {{-- <form method="POST" action="{{ route('logout') }}" class="block"> --}}
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                            Log Out
                        </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-4 hidden md:block">
                <x-header-dashboard>Dashboard</x-header-dashboard>
            </div>
            
            <!-- Content -->
            <main class="p-8 pt-24 md:pt-8">
                <!-- Dashboard Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <!-- Total Members -->
                    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <svg class="h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7a4 4 0 011.26-3A4 4 0 018 3h8a4 4 0 014 4v10a4 4 0 01-4 4H8a4 4 0 01-4-4V7z" />
                        </svg>
                        <div>
                            <p class="text-lg font-semibold">Total Members</p>
                            {{-- <p class="text-2xl font-bold">{{ $totalMembers }}</p> --}}
                        </div>
                    </div>

                    <!-- Outcome -->
                    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <svg class="h-10 w-10 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                        </svg>
                        <div>
                            <p class="text-lg font-semibold">Outcome</p>
                            {{-- <p class="text-xl font-bold">Rp {{ number_format($totalOutcome, 2, ',', '.') }}</p> --}}
                        </div>
                    </div>

                    <!-- Income -->
                    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <svg class="h-10 w-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                        </svg>
                        <div>
                            <p class="text-lg font-semibold">Income</p>
                            {{-- <p class="text-xl font-bold">Rp {{ number_format($totalIncome, 2, ',', '.') }}</p> --}}
                        </div>
                    </div>

                    <!-- Jumlah Transaksi -->
                    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <svg class="h-10 w-10 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 8h4m4 8H5m10 8H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2z" />
                        </svg>
                        <div>
                            <p class="text-lg font-semibold">Total Transactions</p>
                            {{-- <p class="text-2xl font-bold">{{ ($totalTransaksi) }}</p> --}}
                        </div>
                    </div>
                </div>

                <!-- Grafik Pendapatan Harian dan Bulanan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Grafik Pendapatan Harian -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Pendapatan Harian</h3>
                        <canvas id="dailyRevenueChart"></canvas>
                    </div>

                    <!-- Grafik Pendapatan Bulanan -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Pendapatan Bulanan</h3>
                        <canvas id="monthlyRevenueChart"></canvas>
                    </div>
                </div>
            </main>
        </div>

        <!-- Overlay -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>

</body>

</html>
