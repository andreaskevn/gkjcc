@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
        <div class="relative text-center z-10">
            <h1 class="text-6xl font-bold">Warta</h1>
        </div>
    </section>
    <section class="bg-gray-100 py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <p class="text-center text-gray-600 mb-8">
                    Berikut adalah daftar Warta Gereja yang dapat diunduh:
                </p>

                <div class="space-y-4">
                    @forelse($wartas as $warta)
                        <div
                            class="flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-4 transition">
                            <div>
                                <p class="font-medium text-gray-800">{{ $warta->warta_title }}</p>
                                <p class="text-sm text-gray-500">Diunggah oleh: {{ $warta->users->name ?? 'Admin' }}</p>
                            </div>
                            <a href="{{ asset('uploads/' . $warta->warta_file) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition"
                                download>
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                </svg>
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center">Belum ada warta tersedia.</p>
                    @endforelse
                </div>
                <div class="mt-8">
                    {{ $wartas->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
