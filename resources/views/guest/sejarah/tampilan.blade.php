@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
        <div class="relative text-center z-10">
            <h1 class="text-6xl font-bold">Sejarah</h1>
        </div>
    </section>

    <section class="py-12 px-4 md:px-16 bg-white">
        <div class="space-y-12 max-w-5xl mx-auto">
            @for ($i = 0; $i < 5; $i++)
                <div class="flex flex-col md:flex-row md:items-start bg-white rounded shadow-md overflow-hidden">
                    <div class="md:w-1/3 w-full">
                        <img src="{{ asset('images/header.png') }}" alt="Sejarah {{ $i }}"
                            class="w-full h-48 object-cover md:rounded-none rounded-t">
                    </div>
                    <div class="md:w-2/3 w-full p-6">
                        <h1 class="text-xl font-semibold mb-2">1970</h1>
                        <p class="text-gray-700 text-justify">
                            Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing,
                            and web development. Its purpose is to permit a page layout to be designed, independently
                            of the copy.
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection
