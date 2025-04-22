<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'GKJ Condongcatur' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('components.guest.headbar')

    <main class="mt-2 flex-grow">
        {{-- {{ $slot }} --}}
        @yield('content')
    </main>

    @include('components.guest.footer')
</body>
</html>
