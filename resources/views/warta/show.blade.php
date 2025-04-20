<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $warta->warta_title }}</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">

            <!-- Judul -->
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                {{ $warta->warta_title }}
            </h1>

            <!-- Lokasi dan tanggal -->
            <p class="text-sm text-gray-600 mb-6">
                {{ $warta->users->name ?? 'Unknown' }} –
                {{ $warta->created_at->locale('id')->translatedFormat('l, d F Y') }}
            </p>

            @if ($warta->warta_file && Str::endsWith($warta->warta_file, '.pdf'))
                <iframe src="{{ asset('uploads/' . $warta->warta_file) }}" width="100%" height="600px"></iframe>
            @endif

            <!-- Footer -->
            <footer class="text-center text-xs text-gray-500 mt-12 pt-6 border-t">
                COPYRIGHT ©{{ now()->year }}, GKJCC, ALL RIGHTS RESERVED
            </footer>
        </div>
    </div>

</body>

</html>
