<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKJCC | Jadwal Sepekan</title>
    <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <div class="flex min-h-screen relative">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 bg-gray-900 text-white w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
            <x-sidebar></x-sidebar>
        </div>

        <div class="flex-1 flex flex-col md:ml-64 h-screen overflow-y-auto">
            <header
                class="bg-white shadow-md p-4 flex justify-between items-center md:hidden fixed top-0 left-0 right-0 z-40">
                <button id="hamburger" class="text-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">GKJCC | Jadwal Sepekan</h1>
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center px-4 py-2 bg-white rounded-lg shadow font-poppins space-x-3">
                        <div class="ml-3 text-left">
                            <p class="font-bold">{{ Auth::user()->name }}</p>
                            <p class="font-semibold">{{ Auth::user()->role->role_name }}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5 ml-2 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            Profile
                        </a>
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
                <x-header-dashboard>Jadwal Sepekan</x-header-dashboard>
            </div>

            <main class="p-5 pt-24 pb-20 min-h-screen md:pt-0">
                <div class="bg-white shadow-xl rounded-2xl overflow-auto mt-5 md:mt-0">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl font-bold text-white">Daftar Jadwal Sepekan</h1>
                            <a href="{{ route('jadwalsepekan.create') }}"
                                class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah
                            </a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                            <div class="flex flex-wrap gap-4 w-full">
                                <div class="w-full md:w-auto">
                                    <x-limit route="jadwalsepekan" />
                                </div>
                                <div class="w-full sm:w-auto">
                                    <x-search route="jadwalsepekan" />
                                </div>

                                <form action="{{ route('jadwalsepekan') }}" method="GET" id="filterForm"
                                    class="flex space-x-4">
                                    <select name="weekly_schedule_day"
                                        onchange="document.getElementById('filterForm').submit();"
                                        class="border px-3 py-2 rounded-md">
                                        <option value="">- Semua Hari -</option>
                                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                            <option value="{{ $hari }}"
                                                {{ request('weekly_schedule_day') == $hari ? 'selected' : '' }}>
                                                {{ $hari }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <input type="hidden" name="search" value="{{ $search }}">
                                    <input type="hidden" name="limit" value="{{ $limit }}">
                                </form>
                            </div>
                        </div>


                        <!-- Desktop Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full hidden md:table">
                                <thead>
                                    <tr class="bg-gray-100 text-left text-sm font-semibold uppercase tracking-wide">
                                        <th class="py-3 px-6 text-left">Nama Jadwal Sepekan</th>
                                        <th class="py-3 px-6 text-left">Hari</th>
                                        <th class="py-3 px-6 text-left">Jam</th>
                                        <th class="py-3 px-6 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jadwalsepekan as $item)
                                        <tr class="border-b border-gray-300 hover:bg-gray-50 transition duration-200">
                                            <td class="py-3 px-6">{{ $item->weekly_schedule_name }}</td>
                                            <td class="py-3 px-6">{{ $item->weekly_schedule_day }}</td>
                                            <td class="py-3 px-6">{{ $item->weekly_schedule_hour->format('H:i') }}
                                                WIB</td>
                                            <td class="py-3 px-6">
                                                <a href="{{ route('jadwalsepekan.edit', $item->id) }}"
                                                    class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">Edit</a>
                                                <form action="{{ route('jadwalsepekan.destroy', $item->id) }}"
                                                    method="POST" class="inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 delete-button"
                                                        data-id="{{ $item->id }}"
                                                        data-name="{{ $item->weekly_schedule_name }}">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-gray-500 italic">
                                                Tidak ada jadwal di hari ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Mobile Card View -->
                        <div class="md:hidden">
                            @foreach ($jadwalsepekan as $item)
                                <div class="bg-white rounded-lg shadow-md mb-4 p-4">
                                    <div class="text-lg font-semibold text-gray-800 mb-2">
                                        {{ $item->weekly_schedule_name }}
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 text-left">
                                        <p><span class="font-semibold">Hari:</span> {{ $item->weekly_schedule_day }}
                                        </p>
                                        <p><span class="font-semibold">Jam:</span>
                                            {{ $item->weekly_schedule_hour->format('H:i') }}</p>
                                    </div>
                                    <div class="flex gap-2 mt-4">
                                        <a href="{{ route('pengumuman.edit', $item) }}"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 flex-1 text-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST"
                                            class="inline delete-form flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 w-full delete-button"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->weekly_schedule_name }}">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6 flex justify-center">
                            {{ $jadwalsepekan->appends(['search' => request('search'), 'limit' => request('limit')])->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Overlay for Sidebar -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    </div>
    <script>
        // Toggle Sidebar
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        // Close sidebar when clicking outside
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
        // Handle search input change
        // Fungsi untuk menangani pencarian dan pagination
        function updateMenus(page = 1, search = '', limit = '') {
            $.ajax({
                url: '/pengguna', // Sesuaikan URL dengan rute controller
                method: 'GET',
                data: {
                    search: search,
                    limit: limit,
                    page: page
                },
                success: function(response) {
                    // // Update menu list
                    // $('#menuList').html(response.buku);

                    // Update pagination links
                    $('#pagination').html(response.pagination);
                }
            });
        }

        // Pencarian input
        $('#searchInput').on('input', function() {
            var search = $(this).val();
            var limit = $('#limit').val(); // Ambil limit yang dipilih
            updateMenus(1, search, limit); // Panggil updateMenus untuk halaman pertama
        });

        // Handle pagination click
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#searchInput').val(); // Ambil nilai pencarian
            var limit = $('#limit').val(); // Ambil limit yang dipilih
            updateMenus(page, search, limit); // Panggil updateMenus dengan halaman yang diinginkan
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Ambil semua tombol delete
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const form = this.closest('form'); // Ambil form terdekat
                    const penggunaName = this.getAttribute('data-name');

                    // Tampilkan konfirmasi penghapusan
                    Swal.fire({
                        title: `Apakah anda yakin ingin menghapus jadwal ${penggunaName}?`,
                        text: "Data tidak dapat dikembalikan setelah dihapus!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Jika dikonfirmasi, submit form
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
