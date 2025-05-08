@extends('layouts.guest')
@section('title', $lowongan->information_title)

@section('content')
    <div class="bg-white py-8 px-4 sm:px-8 max-w-4xl mx-auto shadow-md rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-center text-gray-900 leading-tight">
            {{ $lowongan->information_title }}
        </h1>

        <div class="flex justify-center items-center text-md text-gray-500 mt-2 space-x-4">
            <div class="flex items-center space-x-1">
                <span>{{ \Carbon\Carbon::parse($lowongan->created_at)->format('d F Y') }}</span>
            </div>
            <div class="w-px h-4 bg-gray-300"></div>
            <div class="flex items-center space-x-1">
                <span>Penulis: {{ $lowongan->user->name }}</span>
            </div>
        </div>

        @if ($lowongan->information_head_cover)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $lowongan->information_head_cover) }}" alt="Cover"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif

        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($lowongan->information_description)) !!}
        </div>

        <div class="mt-10 flex justify-between items-center">
            <a href="{{ route('guestlowongan') }}"
                class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-6 py-2 rounded transition">
                ← Kembali ke Daftar Lowongan
            </a>

            <button onclick="copyLink()"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-6 py-2 rounded transition">
                Bagikan
            </button>
        </div>

        <div class="mt-10 text-center text-gray-700 italic">
            <p>Terima kasih telah membaca, Tuhan Yesus memberkati.</p>
        </div>
    </div>

    <script>
        function copyLink() {
            const dummy = document.createElement("input");
            dummy.value = window.location.href;
            document.body.appendChild(dummy);
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            alert("Link berhasil disalin ke clipboard!");
        }
    </script>
@endsection
