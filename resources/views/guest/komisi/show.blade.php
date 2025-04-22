@extends('layouts.guest')
@section('title', $komisi->commission_name)
@section('content')
    <div class="bg-white py-8 px-4 sm:px-8 max-w-4xl mx-auto shadow-md rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-center text-gray-900 leading-tight">
            {{ $komisi->commission_name }}
        </h1>

        <div class="flex justify-center items-center text-md text-gray-500 mt-2 space-x-4">
            <div class="flex items-center space-x-1">
                <span>{{ \Carbon\Carbon::parse($komisi->created_at)->format('d F Y') }}</span>
            </div>
            <div class="w-px h-4 bg-gray-300"></div>
            <div class="flex items-center space-x-1">
                <span>Penulis: {{ $komisi->users->name }}</span>
            </div>
        </div>
        @if ($komisi->commission_head_cover)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $komisi->commission_head_cover) }}" alt="Cover"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif

        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($komisi->commission_description)) !!}
        </div>

        @if ($komisi->commission_pict)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $komisi->commission_pict) }}" alt="Cover"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif
        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($komisi->commission_description_2)) !!}
        </div>

        <div class="mt-10 text-center text-gray-700 italic">
            <p>Terima Kasih telah membaca, Tuhan Yesus Memberkati.</p>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('home') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-6 py-2 rounded transition">
                ← Kembali ke Daftar Beasiswa
            </a>
        </div>
    </div>
@endsection
