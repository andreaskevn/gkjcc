@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 text-center animate-fade-in">
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-wide uppercase">Visi - Misi</h1>
        </div>
    </section>

    <section class="bg-white py-20 px-6 md:px-20">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2 space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold text-indigo-800">Visi Kami</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Menjadi keluarga Allah yang penuh cinta, religius, peduli, dan melayani.
                </p>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('images/header.png') }}" alt="Visi GKJ Condongcatur"
                    class="w-200 h-64 object-cover rounded-lg shadow-xl border-4 border-gray-900">
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-20 px-6 md:px-20">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-indigo-800 mb-10 text-left md:text-center">Misi Kami</h2>
            @php
                $misi = [
                    'Menyelenggarakan serta mengembangkan ibadah yang kreatif, inovatif, dan partisipatif dengan tidak mengabaikan budaya Jawa.',
                    'Meningkatkan kinerja organisasi gereja dengan melaksanakan manajemen organisasi yang profesional dan akuntabel.',
                    'Meningkatkan pelayanan yang memberdayakan pada anak, remaja dan pemuda tanpa mengabaikan kelompok usia lain.',
                    'Meningkatkan kepedulian segenap warga jemaat terhadap sesama dan lingkungan hidupnya.',
                    'Meningkatkan peran dan pelayanan konkret gereja bagi masyarakat.',
                ];

                $gradient = ['bg-white'];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-6 gap-8">
                @foreach ($misi as $index => $item)
                    @php $bg = $gradient[$index % count($gradient)]; @endphp

                    @if ($index < 3)
                        <div
                            class="md:col-span-2 bg-gradient-to-br {{ $bg }} rounded-3xl shadow-lg p-8 hover:shadow-2xl transition duration-300 min-h-[220px]">
                            <div class="flex items-start gap-4">
                                <div>
                                    <p class="text-gray-900 text-base md:text-lg leading-relaxed">{{ $item }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div
                            class="md:col-span-3 bg-gradient-to-br {{ $bg }} rounded-3xl shadow-lg p-8 hover:shadow-2xl transition duration-300 min-h-[220px]">
                            <div class="flex items-start gap-4">
                                <div>
                                    <p class="text-gray-900 text-base md:text-lg leading-relaxed">{{ $item }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
@endsection
