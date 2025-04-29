<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="min-h-screen flex flex-col items-center justify-center bg-gray-100 p-4">
    <div class="w-full max-w-xl bg-white rounded-lg shadow-lg p-8 min-h-screen flex flex-col justify-center md:min-h-0 md:mt-12">
        <!-- Logo dan Judul -->
        <div class="flex flex-col items-center mb-6">
            <img src="img/logo.jpeg" alt="Logo" class="w-32 h-32 mb-4">
            <h1 class="text-blue-800 text-lg font-medium leading-tight text-center">GKJ Condongcatur</h1>
            <h2 class="text-black text-3xl font-bold text-center">Login</h2>
        </div>

        <!-- Form Login -->
        <form id="loginForm" class="space-y-6">
            <input type="email" name="email" required
                class="w-full px-4 py-3 border border-blue-300 rounded-md bg-blue-50" placeholder="Email" />

            <input type="password" name="password" required
                class="w-full px-4 py-3 border border-blue-300 rounded-md bg-blue-50" placeholder="Password" />

            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-indigo-900 to-blue-500 text-white font-semibold rounded-md hover:from-indigo-800 hover:to-blue-800 transition">LOG IN</button>

            <p id="responseMsg" class="text-sm mt-2 text-center"></p>
        </form>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#loginForm').submit(function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.post('/login', formData, function(response) {
                if (response.success) {
                    localStorage.setItem('loggedIn', 'true');
                    $('#responseMsg').text(response.message).removeClass().addClass('text-green-600');
                    setTimeout(() => window.location.href = "/dashboard", 1000);
                } else {
                    $('#responseMsg').text(response.message).removeClass().addClass('text-red-600');
                }
            }).fail(function(xhr) {
                $('#responseMsg').text('Terjadi kesalahan server.').removeClass().addClass('text-red-600');
            });
        });
    </script>
</body>


</html>
