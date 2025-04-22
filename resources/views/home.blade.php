@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0 bg-[#0D0D0D] bg-opacity-70"></div>
        <div class="relative text-center z-10">
            <h1 class="text-4xl font-bold">Selamat Datang</h1>
            <p class="text-lg mt-2">Di situs resmi GKJ Condongcatur</p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 text-center">
        <div class="container mx-auto px-4 py-8 text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Jadwal Ibadah</h2>

            <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6">
                @foreach ($worshipSchedules as $categoryId => $schedules)
                    <div class="rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105 duration-300">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-500 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white">
                                {{ $schedules->first()->category->worship_schedule_category_name }}
                            </h3>
                        </div>

                        <div class="bg-white p-6">
                            @foreach ($schedules as $schedule)
                                <div class="mb-4 border-b pb-3 last:border-b-0 last:pb-0">
                                    <h4 class="text-lg font-medium text-gray-800">{{ $schedule->worship_schedule_name }}
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        {{ $schedule->worship_schedule_day }} |
                                        {{ $schedule->worship_schedule_hour->format('H:i') }} |
                                        {{ $schedule->worship_schedule_language }}
                                    </p>
                                    <p class="text-sm text-gray-500 mt-1">Bersama: {{ $schedule->pastor->pastor_name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <section class="max-w-6xl mx-auto my-12 px-4">
        <h2 class="text-xl font-bold mb-4 text-center">Pengumuman</h2>
        <div class="grid md:grid-cols-3 gap-4">
            @foreach ($pengumuman as $item)
                <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                    :link="route('guestpengumuman.show', $item->id)" />
            @endforeach
        </div>
    </section>

    <section class="max-w-6xl mx-auto my-12 px-4">
        <h2 class="text-xl font-bold mb-4 text-center">Berita Terbaru</h2>
        <div class="grid md:grid-cols-3 gap-4">
            @foreach ($berita as $item)
                <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                    :link="route('berita.show', $item->id)" />
            @endforeach
        </div>
    </section>
@endsection
