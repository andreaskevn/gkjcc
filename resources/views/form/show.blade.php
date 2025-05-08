<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form->form_name }}</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">

            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                {{ $form->form_name }}
            </h1>

            <p class="text-sm text-gray-600 mb-6">
                {{ $form->users->name ?? 'Unknown' }} –
                {{ $form->created_at->locale('id')->translatedFormat('l, d F Y') }}
            </p>

            @if ($form->form_file && Str::endsWith($form->form_file, '.pdf'))
                <iframe src="{{ asset('uploads/' . $form->form_file) }}" width="100%" height="600px"></iframe>
            @endif
            @if ($form->form_file && Str::endsWith($form->form_file, '.docx'))
                <iframe src="{{ asset('uploads/' . $form->form_file) }}" width="100%" height="600px"></iframe>
            @endif

            <footer class="text-center text-xs text-gray-500 mt-12 pt-6 border-t">
                COPYRIGHT ©{{ now()->year }}, GKJCC, ALL RIGHTS RESERVED
            </footer>
        </div>
    </div>

</body>

</html>
