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
                                    <p class="font-bold">{{ Auth::user()->name }}</p>
                                    <p class="font-semibold">{{ Auth::user()->role->nama_role }}</p>
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
                                <form method="POST" action="{{ route('logout') }}" class="block">
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

                    <main class="p-4 md:p-8 pt-24 md:pt-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <!-- Total Pengunjung -->
                            <div
                                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex items-center gap-4">
                                <div class="bg-blue-100 rounded-full p-3">
                                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7a4 4 0 011.26-3A4 4 0 018 3h8a4 4 0 014 4v10a4 4 0 01-4 4H8a4 4 0 01-4-4V7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Total Pengunjung</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $guestCount }}</p>
                                </div>
                            </div>

                            <!-- Mingguan -->
                            <div
                                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex items-center gap-4">
                                <div class="bg-red-100 rounded-full p-3">
                                    <svg class="h-8 w-8 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v8m4-4H8" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Pengunjung Minggu Ini</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $weeklyGuestCount }}</p>
                                </div>
                            </div>

                            <!-- Bulanan -->
                            <div
                                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex items-center gap-4">
                                <div class="bg-green-100 rounded-full p-3">
                                    <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v8m4-4H8" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Pengunjung Bulan Ini</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $monthlyUniqueGuestCount }}</p>
                                </div>
                            </div>

                            <!-- Jumlah Pendeta -->
                            <div
                                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex items-center gap-4">
                                <div class="bg-purple-100 rounded-full p-3">
                                    <svg class="h-8 w-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.761 0 5.304.802 7.379 2.178M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Jumlah Pendeta</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $jumlahPendeta }}</p>
                                </div>
                            </div>

                            <!-- Jumlah Komisi -->
                            <div
                                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex items-center gap-4">
                                <div class="bg-yellow-100 rounded-full p-3">
                                    <svg class="h-8 w-8 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16v-1a4 4 0 018 0v1M6 10a2 2 0 114 0 2 2 0 01-4 0zm8 0a2 2 0 114 0 2 2 0 01-4 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Jumlah Komisi</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $jumlahKomisi }}</p>
                                </div>
                            </div>

                            <!-- Jumlah Paduan Suara -->
                            <div
                                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex items-center gap-4">
                                <div class="bg-indigo-100 rounded-full p-3">
                                    <svg class="h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 17v-2a4 4 0 018 0v2m-4-6a4 4 0 100-8 4 4 0 000 8zm-6 6v-2a4 4 0 018 0v2" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Jumlah Paduan Suara</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $jumlahPadus }}</p>
                                </div>
                            </div>
                        </div>
                    </main>

                </div>

                <!-- Overlay -->
                <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
            </div>

        </body>

        </html>
