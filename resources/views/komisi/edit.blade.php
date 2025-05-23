<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komisi</title>
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
                <h1 class="text-2xl font-bold text-gray-900">Ubah Komisi</h1>
            </div>

            <!-- Form Area -->
            <main class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="w-full max-w-4xl bg-white p-10 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Ubah Komisi</h2>

                    <form action="{{ route('commission.update', $komisi) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="commission_name" class="block text-gray-700 text-sm font-medium">Nama
                                Komisi</label>
                            <input type="text" name="commission_name" id="commission_name"
                                value="{{ $komisi->commission_name }}" required
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('commission_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="bidang_id" class="block text-sm font-medium text-gray-700">Pilih Bidang</label>
                            <select name="bidang_id" id="bidang_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Pilih Bidang --</option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}"
                                        {{ $komisi->bidang_id == $bidang->id ? 'selected' : '' }}>
                                        {{ $bidang->bidang_name }}</option>
                                @endforeach
                            </select>
                            @error('bidang_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="commission_description"
                                class="block text-gray-700 text-sm font-medium">Deskripsi Komisi</label>
                            <textarea name="commission_description" id="commission_description" rows="6"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>{{ old('commission_description', $komisi->commission_description) }}</textarea>
                            @error('commission_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="image1" class="block text-sm font-medium text-gray-900">Cover Komisi</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                                id="drop-area-1">
                                <div class="text-center">
                                    <input id="image1" name="image1" type="file" class="sr-only"
                                        accept="image/*">
                                    <span id="file-upload-label-1">Unggah gambar untuk cover atau drag n drop ke
                                        sini.</span>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-600">PNG, JPG, hingga 5MB</p>
                            @if ($komisi->commission_head_cover)
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600">Cover saat ini:</p>
                                    <img src="{{ asset('img/' . $komisi->commission_head_cover) }}" alt="Current cover"
                                        class="w-40 mt-2 rounded-md border border-gray-300 shadow">
                                </div>
                            @endif
                        </div>
                        <label for="commission_description_2" class="block text-gray-700 text-sm font-medium">Deskripsi
                            Komisi</label>
                        <textarea name="commission_description_2" id="commission_description_2" rows="6"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('commission_description', $komisi->commission_description_2) }}</textarea>
                        @error('commission_description_2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div class="col-span-full">
                            <label for="image2" class="block text-sm font-medium text-gray-900">Gambar Kegiatan
                                Komisi</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                                id="drop-area-2">
                                <div class="text-center">
                                    <input id="image2" name="image2" type="file" class="sr-only"
                                        accept="image/*">
                                    <span id="file-upload-label-2">Unggah gambar untuk kegiatan atau drag n drop ke
                                        sini.</span>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-600">PNG, JPG, hingga 5MB</p>
                            @error('image2')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($komisi->commission_pict)
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">Cover saat ini:</p>
                                <img src="{{ asset('img/' . $komisi->commission_pict) }}" alt="Current cover"
                                    class="w-40 mt-2 rounded-md border border-gray-300 shadow">
                            </div>
                        @endif
                        
                        <div class="mt-6 flex justify-between gap-4">
                            <button type="button" onclick="window.location='{{ route('commission') }}'"
                                class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out hover:bg-red-700">
                                Cancel
                            </button>
                            <button type="submit"
                                class="w-full py-3 px-4 bg-gray-900 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out hover:bg-gray-700">
                                Simpan
                            </button>
                        </div>
                </div>
                </form>
        </div>
        </main>
    </div>

    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    </div>


    <script>
        function setupDropArea(dropAreaId, inputId, labelId) {
            const dropArea = document.getElementById(dropAreaId);
            const fileInput = document.getElementById(inputId);
            const fileUploadLabel = document.getElementById(labelId);

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
        }
        setupDropArea('drop-area-1', 'image1', 'file-upload-label-1');
        setupDropArea('drop-area-2', 'image2', 'file-upload-label-2');
    </script>
</body>

</html>
