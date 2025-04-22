@extends('layouts.guest')
@section('title', $pengumuman->information_title)
@section('content')
    <div class="bg-white py-8 px-4 sm:px-8 max-w-4xl mx-auto shadow-md rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-center text-gray-900 leading-tight">
            {{ $pengumuman->information_title }}
        </h1>

        <div class="flex justify-center items-center text-md text-gray-500 mt-2 space-x-4">
            <div class="flex items-center space-x-1">
                <span>{{ \Carbon\Carbon::parse($pengumuman->created_at)->format('d F Y') }}</span>
            </div>

            <!-- Divider -->
            <div class="w-px h-4 bg-gray-300"></div>

            <div class="flex items-center space-x-1">
                <span>Penulis: {{ $pengumuman->user->name }}</span>
            </div>
        </div>

        @if ($pengumuman->information_head_cover)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $pengumuman->information_head_cover) }}" alt="Cover"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif

        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($pengumuman->information_description)) !!}
        </div>

        @if ($rekomendasi->count())
            <div class="max-w-6xl mx-auto mt-16">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Baca Juga Pengumuman Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($rekomendasi as $item)
                        <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                            :link="route('guestpengumuman.show', $item->id)" />
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-10 text-center text-gray-700 italic">
            <p>Terima Kasih telah membaca, Tuhan Yesus Memberkati.</p>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('home') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-6 py-2 rounded transition">
                ← Kembali ke Daftar Pengumuman
            </a>
        </div>
    </div>
@endsection
