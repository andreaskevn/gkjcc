<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengugna</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen relative">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 bg-gray-900 text-white w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
            <x-sidebar></x-sidebar>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:ml-64">
            <!-- Header (Optional) -->
            <div class="p-4 hidden md:block">
                <h1 class="text-2xl font-bold text-gray-900">Ubah Pengguna</h1>
            </div>

            <main class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Ubah Pengguna Pelanggan</h2>

                    <form action="{{ route('pengguna.update', $pengguna) }}" method="POST" class="space-y-6"
                        enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="name" class="block text-gray-700 text-sm font-medium">Nama
                                Pengguna</label>
                            <input type="text" name="name" id="name" value="{{ $pengguna->name }}" required
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 text-sm font-medium">Email</label>
                            <input type="email" name="email" id="email" value="{{ $pengguna->email }}"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="role_id" class="block text-gray-700 text-sm font-medium">Role</label>
                            <select name="role_id" id="role_id"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $item)
                                <option value="{{ $item->id }}"
                                    {{ $pengguna->role_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->role_name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-between gap-4">
                            <button type="button"
                                class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out hover:bg-red-700"
                                onclick="window.location='{{ route('pengguna') }}'">Cancel</button>
                            <button type="submit"
                                class="w-full py-3 px-4 bg-gray-900 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out hover:bg-gray-700">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>

        <!-- Overlay for mobile -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        if (hamburger) {
            hamburger.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });
        }

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
</body>

</html>
