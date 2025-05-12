@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-60 md:h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
        <div class="relative text-center z-10">
            <h1 class="text-4xl md:text-6xl font-bold">Struktur Organisasi</h1>
        </div>
    </section>

    <section class="pt-6 md:pt-12 px-4 md:px-16 bg-white">
        <div class="overflow-x-auto">
            <img src="{{ asset('images/struktur-organisasi.png') }}" alt="Struktur Organisasi"
                class="w-[1200px] md:w-full mx-auto">
        </div>
    </section>
    {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
@endsection
