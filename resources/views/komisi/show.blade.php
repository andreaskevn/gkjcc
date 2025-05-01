<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $komisi->commission_name }}</title>
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

            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                {{ $komisi->commission_name }}
            </h1>

            <p class="text-sm text-gray-600 mb-6">
                {{ $komisi->users->name ?? 'Unknown' }} –
                {{ $komisi->created_at->locale('id')->translatedFormat('l, d F Y') }}
            </p>

            @if ($komisi->commission_head_cover)
                <img src="{{ asset('img/' . $komisi->commission_head_cover) }}" alt="Cover Komisi"
                    class="w-full rounded-lg mb-6 shadow-md object-cover">
            @endif

            <div class="text-base leading-relaxed space-y-4 text-justify">
                {!! nl2br(e($komisi->commission_description)) !!}
            </div>

            @if ($komisi->commission_pict)
                <img src="{{ asset('img/' . $komisi->commission_pict) }}" alt="Cover Komisi"
                    class="w-full rounded-lg mb-6 shadow-md object-cover">
            @endif

            <div class="text-base leading-relaxed space-y-4 text-justify">
                {!! nl2br(e($komisi->commission_description_2)) !!}
            </div>

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('commission') }}"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 text-sm">← Kembali</a>

                <button onclick="copyLink()"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">Bagikan</button>
            </div>

            <footer class="text-center text-xs text-gray-500 mt-12 pt-6 border-t">
                COPYRIGHT ©{{ now()->year }}, GKJCC, ALL RIGHTS RESERVED
            </footer>
        </div>
    </div>

</body>

</html>
