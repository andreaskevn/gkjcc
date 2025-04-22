@extends('layouts.guest')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">
        @php
            $groupedForms = $forms->groupBy('form_category_id');
        @endphp

        @foreach ($groupedForms as $categoryId => $formsGroup)
            @php
                $categoryName = $formsGroup->first()->category->form_category_name ?? 'Tanpa Kategori';
            @endphp

            <div class="mb-10 border rounded-md overflow-hidden shadow-sm">
                <div class="bg-gray-200 px-6 py-3">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $categoryName }}</h2>
                </div>

                <div class="divide-y">
                    @foreach ($formsGroup as $form)
                        @php
                            $extension = strtolower(pathinfo($form->form_file, PATHINFO_EXTENSION));
                        @endphp

                        <div class="flex items-center justify-between px-6 py-4 bg-white">
                            <div class="flex items-center gap-4">
                                <div class="text-black">
                                    @switch($extension)
                                        @case('pdf')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M17 6.414V16a2 2 0 01-2 2H5a2 2 0 01-2-2V4a2 2 0 012-2h6.586A2 2 0 0113 2.586l4 4zM7 9H5v2h2a1 1 0 000-2zm1 0v4h1v-1h1a1 1 0 000-2H8zm4 0v1h1v1h-1v1h-1V9h2z" />
                                            </svg>
                                        @break

                                        @case('doc')
                                        @case('docx')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M4 3a1 1 0 00-1 1v12a1 1 0 001 1h5v-2H5V6h4V4H4zm11 0h-3a1 1 0 00-1 1v12a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1z" />
                                            </svg>
                                        @break

                                        @default
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" />
                                            </svg>
                                    @endswitch

                                </div>

                                <div>
                                    <a href="{{ asset('uploads/' . $form->form_file) }}" target="_blank"
                                        class="text-blue-700 font-bold hover:underline block">
                                        {{ $form->form_name }}
                                    </a>
                                    <span class="text-sm text-gray-600">1 file | 120kb</span>
                                </div>
                            </div>

                            <a href="{{ asset('uploads/' . $form->form_file) }}" target="_blank"
                                class="bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-4 py-2 rounded">
                                Download
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
