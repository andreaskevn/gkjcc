@extends('layouts.guest')
@section('title', $paduan_suara->choir_name)

@section('content')
    <div class="bg-white py-8 px-4 sm:px-8 max-w-4xl mx-auto shadow-md rounded-lg mt-6">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-center text-gray-900 leading-tight">
            {{ $paduan_suara->choir_name }}
        </h1>

        <!-- Info penulis dan tanggal -->
        <div class="flex justify-center items-center text-md text-gray-500 mt-2 space-x-4">
            <div class="flex items-center space-x-1">
                <span>{{ \Carbon\Carbon::parse($paduan_suara->created_at)->format('d F Y') }}</span>
            </div>
            <div class="w-px h-4 bg-gray-300"></div>
            <div class="flex items-center space-x-1">
                <span>Penulis: {{ $paduan_suara->users->name }}</span>
            </div>
        </div>

        <!-- Gambar Header -->
        @if ($paduan_suara->choir_head_cover)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $paduan_suara->choir_head_cover) }}" alt="Cover"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif

        <!-- Deskripsi 1 -->
        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($paduan_suara->choir_description)) !!}
        </div>

        <!-- Gambar Kedua -->
        @if ($paduan_suara->choir_pict)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $paduan_suara->choir_pict) }}" alt="Gambar Tambahan"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif

        <!-- Deskripsi 2 -->
        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($paduan_suara->choir_description_2)) !!}
        </div>

        <!-- Penutup -->
        <div class="mt-10 text-center text-gray-700 italic">
            <p>Terima kasih telah membaca, Tuhan Yesus memberkati.</p>
        </div>

        <!-- Tombol Bagikan & Kembali -->
        <div class="mt-10 flex justify-between items-center">
            <a href="{{ route('guestpaduansuara') }}"
                class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-6 py-2 rounded transition">
                ← Kembali ke Daftar Paduan Suara
            </a>

            <button onclick="copyLink()"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-6 py-2 rounded transition">
                Bagikan
            </button>
        </div>
    </div>

    <!-- Script Bagikan -->
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
