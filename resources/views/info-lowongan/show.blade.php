<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lowongan->information_title }}</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script>
        function copyLink() {
            const dummy = document.createElement("input");
            dummy.value = window.location.href;
            document.body.appendChild(dummy);
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            alert("Link berhasil disalin!");
        }
    </script>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">

            <!-- Judul -->
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                {{ $lowongan->information_title }}
            </h1>

            <!-- Penulis dan Tanggal -->
            <p class="text-sm text-gray-600 mb-6">
                {{ $lowongan->user->name ?? 'Unknown' }} –
                {{ $lowongan->created_at->locale('id')->translatedFormat('l, d F Y') }}
            </p>

            <!-- Gambar Cover -->
            @if ($lowongan->information_head_cover)
                <img src="{{ asset('img/' . $lowongan->information_head_cover) }}" alt="Cover lowongan"
                    class="w-full rounded-lg mb-6 shadow-md object-cover">
            @endif

            <!-- Deskripsi -->
            <div class="text-base leading-relaxed space-y-4 text-justify mb-6">
                {!! nl2br(e($lowongan->information_description)) !!}
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('info-lowongan') }}"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 text-sm">← Kembali</a>

                <button onclick="copyLink()"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">Bagikan</button>
            </div>

            <!-- Footer -->
            <footer class="text-center text-xs text-gray-500 mt-12 pt-6 border-t">
                COPYRIGHT ©{{ now()->year }}, GKJCC, ALL RIGHTS RESERVED
            </footer>

        </div>
    </div>

</body>

</html>
