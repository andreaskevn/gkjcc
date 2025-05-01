@extends('layouts.guest')
@section('title', $beasiswa->scholarship_title)

@section('content')
    <div class="bg-white py-8 px-4 sm:px-8 max-w-4xl mx-auto shadow-md rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-center text-gray-900 leading-tight">
            {{ $beasiswa->scholarship_title }}
        </h1>

        <div class="flex justify-center items-center text-md text-gray-500 mt-2 space-x-4">
            <div class="flex items-center space-x-1">
                <span>{{ \Carbon\Carbon::parse($beasiswa->created_at)->format('d F Y') }}</span>
            </div>
            <div class="w-px h-4 bg-gray-300"></div>
            <div class="flex items-center space-x-1">
                <span>Penulis: {{ $beasiswa->users->name }}</span>
            </div>
        </div>

        @if ($beasiswa->scholarship_head_cover)
            <div class="my-6 flex justify-center">
                <img src="{{ asset('img/' . $beasiswa->scholarship_head_cover) }}" alt="Cover"
                    class="rounded-lg shadow-lg w-full max-w-3xl object-cover">
            </div>
        @endif

        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
            {!! nl2br(e($beasiswa->scholarship_description)) !!}
        </div>

        @if ($beasiswa->scholarship_phone)
            <div class="mt-6 text-gray-700">
                <strong>Kontak / Nomor Telepon:</strong>
                <a href="tel:{{ $beasiswa->scholarship_phone }}" class="text-blue-600 hover:underline">
                    {{ $beasiswa->scholarship_phone }}
                </a>
            </div>
        @endif

        @if ($rekomendasi->count())
            <div class="max-w-6xl mx-auto mt-16">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Baca Juga Beasiswa Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($rekomendasi as $item)
                        <x-card :image="$item->scholarship_head_cover" :title="$item->scholarship_title" :by="$item->users->name" :date="$item->created_at" :description="$item->scholarship_description"
                            :link="route('guestbeasiswa.show', $item->id)" />
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-10 text-center text-gray-700 italic">
            <p>Terima kasih telah membaca, Tuhan Yesus memberkati.</p>
        </div>

        <!-- Tombol Bagikan & Kembali -->
        <div class="mt-10 flex justify-between items-center">
            <a href="{{ route('guestbeasiswa') }}"
                class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-6 py-2 rounded transition">
                ← Kembali ke Daftar Beasiswa
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
