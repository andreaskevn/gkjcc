<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Formulir Sakramental</title>
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
                <h1 class="text-2xl font-bold text-gray-900">Tambah Formulir Sakramental</h1>
            </div>

            <!-- Form Area -->
            <main class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="w-full max-w-4xl bg-white p-10 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Tambah Formulir Sakramental</h2>

                    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <div>
                            <label for="form_name" class="block text-gray-700 text-sm font-medium">Nama Form Sakramental</label>
                            <input type="text" name="form_name" id="form_name" value="{{ old('form_name') }}"
                                required
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="form_category_id" class="block text-gray-700 text-sm font-medium">Pilih
                                Kategori Sakramental</label>
                            <select name="form_category_id" id="form_category_id" required
                                class="mt-1 block w-full px-4 py-3 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Kategori Sakramental--</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->form_category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-full">
                            <label for="file" class="block text-sm font-medium text-gray-900">File Formulir Sakramental</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                                id="drop-area">
                                <div class="text-center">
                                    <input id="file" name="file" type="file" class="sr-only"
                                        accept=".pdf,.docx" required>
                                    <span id="file-upload-label" class="text-sm text-gray-600">Unggah file atau drag n
                                        drop ke sini.</span>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-red-500 text-sm mt-1">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <p class="mt-1 text-xs text-gray-600">PDF, DOCX, hingga 5MB</p>
                        </div>

                        <div class="mt-6 flex justify-between gap-4">
                            <button type="button" onclick="window.location='{{ route('form') }}'"
                                class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition">
                                Cancel
                            </button>
                            <button type="submit"
                                class="w-full py-3 px-4 bg-gray-900 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 transition">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </main>

        </div>

        <!-- Overlay for mobile -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    </div>


    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        if (hamburger) {
            hamburger.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });
        }

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('file');
        const fileUploadLabel = document.getElementById('file-upload-label');

        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('border-indigo-600');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-indigo-600');
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.classList.remove('border-indigo-600');
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                fileUploadLabel.textContent = files[0].name;
            }
        });

        dropArea.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileUploadLabel.textContent = fileInput.files[0].name;
            }
        });
    </script>
</body>

</html>
