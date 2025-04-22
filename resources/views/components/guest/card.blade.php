<div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 p-6 flex flex-col justify-between">
    <div>
        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $form->form_name }}</h3>
        <p class="text-sm text-gray-600 mb-4">
            Kategori: <span class="font-medium">{{ $form->category->form_category_name }}</span>
        </p>
    </div>

    <a href="{{ asset('storage/' . $form->form_file) }}"
        class="inline-block mt-auto bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition"
        target="_blank">
        Lihat / Unduh Formulir
    </a>
</div>
