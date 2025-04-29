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

<body class="flex flex-col md:flex-row min-h-screen">
    <!-- Form Login -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-white p-8">
        <form id="loginForm" class="w-full max-w-md">
            <h2 class="text-3xl font-bold mb-8 text-center">Login</h2>

            <label class="block mb-1 text-sm font-medium">Email:</label>
            <input type="email" name="email" required
                class="w-full px-4 py-2 mb-4 border border-blue-500 rounded-md" />

            <label class="block mb-1 text-sm font-medium">Password:</label>
            <input type="password" name="password" required
                class="w-full px-4 py-2 mb-6 border border-blue-500 rounded-md" />

            <button type="submit"
                class="w-full py-2 font-semibold text-white bg-gradient-to-r from-indigo-900 to-blue-500 rounded-md">Submit</button>

            <p id="responseMsg" class="text-sm mt-4 text-center"></p>
        </form>
    </div>

    <!-- Right Side Image -->
    <div class="hidden md:flex w-1/2 items-center justify-center bg-gray-100">
        <img src="img/login-hero.png" alt="Login Hero" class="w-[665px] h-[832px] object-cover" />
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
