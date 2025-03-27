<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIPOLUBOGO' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">SIPOLUBOGO</a>
            <div>
                {{-- <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-blue-600 rounded">Login</a> --}}
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container mx-auto p-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; 2024 SIPOLUBOGO. All rights reserved.</p>
    </footer>

</body>
</html>
