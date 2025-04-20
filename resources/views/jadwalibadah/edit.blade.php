<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Ibadah</title>
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
            <!-- Header -->
            <div class="p-4 hidden md:block">
                <h1 class="text-2xl font-bold text-gray-900">Tambah Jadwal Ibadah</h1>
            </div>

            <!-- Form Area -->
            <main class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="w-full max-w-4xl bg-white p-10 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Tambah Jadwal Ibadah</h2>

                    <form action="{{ route('jadwalibadah.update', $jadwalibadah->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('POST')

                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 text-sm font-medium mb-1">Kategori
                                Jadwal Ibadah</label>
                            <select name="category_id" id="category_id" required
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $jadwalibadah->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->worship_schedule_category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="worship_schedule_name" class="block text-gray-700 text-sm font-medium">Nama
                                Jadwal Ibadah</label>
                            <input type="text" name="worship_schedule_name" id="worship_schedule_name"
                                value="{{ old('worship_schedule_name', $jadwalibadah->worship_schedule_name) }}"
                                required
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4 flex gap-4">
                            <div class="w-1/2">
                                <label for="worship_schedule_hour"
                                    class="block text-gray-700 text-sm font-medium mb-1">Jam</label>
                                <input type="time" name="worship_schedule_hour" id="worship_schedule_hour"
                                    value="{{ old('worship_schedule_hour', \Carbon\Carbon::parse($jadwalibadah->worship_schedule_hour)->format('H:i')) }}"
                                    required class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div class="w-1/2">
                                <label for="worship_schedule_day"
                                    class="block text-gray-700 text-sm font-medium mb-1">Hari</label>
                                <select name="worship_schedule_day" id="worship_schedule_day" required
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm">
                                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                        <option value="{{ $hari }}"
                                            {{ $jadwalibadah->worship_schedule_day == $hari ? 'selected' : '' }}>
                                            {{ $hari }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="worship_schedule_language"
                                class="block text-gray-700 text-sm font-medium mb-1">Bahasa</label>
                            <select name="worship_schedule_language" id="worship_schedule_language" required
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm">
                                <option value="Bahasa Indonesia"
                                    {{ $jadwalibadah->worship_schedule_language == 'Bahasa Indonesia' ? 'selected' : '' }}>
                                    Bahasa Indonesia</option>
                                <option value="Bahasa Jawa"
                                    {{ $jadwalibadah->worship_schedule_language == 'Bahasa Jawa' ? 'selected' : '' }}>
                                    Bahasa Jawa</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="pastor_id" class="block text-gray-700 text-sm font-medium mb-1">Pendeta</label>
                            <select name="pastor_id" id="pastor_id" required
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Pendeta --</option>
                                @foreach ($pastor as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $jadwalibadah->pastor_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->pastor_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-6 flex justify-between gap-4">
                            <button type="button" onclick="window.location='{{ route('jadwalibadah') }}'"
                                class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">
                                Cancel
                            </button>
                            <button type="submit"
                                class="w-full py-3 px-4 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-700">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    </div>

</body>

</html>
