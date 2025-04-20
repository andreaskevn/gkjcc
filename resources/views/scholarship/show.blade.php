<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $scholarship->scholarship_title }}</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">

            <!-- Judul -->
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                {{ $scholarship->scholarship_title }}
            </h1>

            <!-- Lokasi dan tanggal -->
            <p class="text-sm text-gray-600 mb-6">
                {{ $scholarship->users->name ?? 'Unknown' }} – {{ $scholarship->created_at->locale('id')->translatedFormat('l, d F Y') }}
            </p>

            <!-- Gambar -->
            @if ($scholarship->scholarship_head_cover)
                <img src="{{ asset('img/' . $scholarship->scholarship_head_cover) }}" alt="Cover Berita"
                    class="w-full rounded-lg mb-6 shadow-md object-cover">
            @endif

            <!-- Deskripsi -->
            <div class="text-base leading-relaxed space-y-4 text-justify">
                {!! nl2br(e($scholarship->scholarship_description)) !!}
            </div>

            <!-- Footer -->
            <footer class="text-center text-xs text-gray-500 mt-12 pt-6 border-t">
                COPYRIGHT ©{{ now()->year }}, GKJCC, ALL RIGHTS RESERVED
            </footer>
        </div>
    </div>

</body>

</html>
