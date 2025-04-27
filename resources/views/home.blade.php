@extends('layouts.guest')

@section('content')
    <div class="bg-white">
        <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
            style="background-image: url('{{ asset('images/header.png') }}')">
            <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
            <div class="relative text-center z-10">
                <h1 class="text-6xl font-bold">Selamat Datang</h1>
                <p class="text-2xl mt-2">Di situs resmi GKJ Condongcatur</p>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-6 py-16 bg-white">
            <h2 class="text-4xl font-bold text-left text-gray-900 mb-12">Jadwal Ibadah</h2>
            <div class="hidden md:grid md:grid-cols-3 gap-8">
                @foreach ($worshipSchedules as $categoryId => $schedules)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-5">
                            <h3 class="text-xl text-white font-semibold">
                                {{ $schedules->first()->category->worship_schedule_category_name }}
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            @foreach ($schedules as $schedule)
                                <div class="border-b pb-4 last:border-none last:pb-0">
                                    <h4 class="text-lg font-medium text-gray-900">{{ $schedule->worship_schedule_name }}
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

            <div class="flex md:hidden gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth px-4">
                @foreach ($worshipSchedules as $categoryId => $schedules)
                    <div class="min-w-[90%] snap-start bg-white rounded-2xl overflow-hidden shadow-lg shrink-0">
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-5">
                            <h3 class="text-xl text-white font-semibold">
                                {{ $schedules->first()->category->worship_schedule_category_name }}
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            @foreach ($schedules as $schedule)
                                <div class="border-b pb-4 last:border-none last:pb-0">
                                    <h4 class="text-lg font-medium text-gray-900">{{ $schedule->worship_schedule_name }}
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
            <div class="container mx-auto px-0 py-8">
                @php
                    $daysOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    $groupedSchedules = $jadwalsepekan->groupBy('weekly_schedule_day');
                @endphp
                <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">Jadwal Sepekan</h2>

                {{-- Desktop View --}}
                <div class="hidden md:grid md:grid-cols-3 gap-8">
                    @foreach ($daysOrder as $day)
                        @if ($groupedSchedules->has($day))
                            <div
                                class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-5">
                                    <h3 class="text-xl text-white font-semibold">{{ $day }}</h3>
                                </div>
                                <div class="p-6 space-y-4">
                                    @foreach ($groupedSchedules[$day] as $schedule)
                                        <div class="border-b pb-4 last:border-none last:pb-0">
                                            <h4 class="text-lg font-medium text-gray-900">
                                                {{ $schedule->weekly_schedule_name }}</h4>
                                            <p class="text-sm text-gray-600 mt-1">
                                                {{ date('H:i', strtotime($schedule->weekly_schedule_hour)) }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- Mobile View --}}
                <div class="md:hidden space-y-6">
                    @foreach ($daysOrder as $day)
                        @if ($groupedSchedules->has($day))
                            <div class="bg-white rounded-xl shadow p-4">
                                <h3 class="text-lg font-bold text-indigo-700 mb-3">{{ $day }}</h3>
                                @foreach ($groupedSchedules[$day] as $schedule)
                                    <div class="mb-4 last:mb-0">
                                        <h4 class="text-base font-semibold text-gray-800">
                                            {{ $schedule->weekly_schedule_name }}</h4>
                                        <p class="text-sm text-gray-600">
                                            {{ date('H:i', strtotime($schedule->weekly_schedule_hour)) }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

    </div>

    <section class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">Pengumuman</h2>

        <div class="hidden md:grid md:grid-cols-3 gap-6">
            @foreach ($pengumuman as $item)
                <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                    :link="route('guestpengumuman.show', $item->id)" />
            @endforeach
        </div>

        <div class="md:hidden flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth px-4">
            @foreach ($pengumuman as $item)
                <div class="snap-start bg-white rounded-xl overflow-hidden shadow-lg flex-shrink-0 w-[80%]">
                    <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                        :link="route('guestpengumuman.show', $item->id)" />
                </div>
            @endforeach
        </div>
    </section>

    <div class="bg-white">
        <section class="max-w-7xl mx-auto px-6 py-12">
            <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">Berita Terbaru</h2>

            <div class="hidden md:grid md:grid-cols-3 gap-6">
                @foreach ($berita as $item)
                    <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                        :link="route('guestberita.show', $item->id)" />
                @endforeach
            </div>

            <div class="md:hidden flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth px-4">
                @foreach ($berita as $item)
                    <div class="snap-start bg-white rounded-xl overflow-hidden shadow-lg flex-shrink-0 w-[80%]">
                        <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at"
                            :description="$item->information_description" :link="route('guestberita.show', $item->id)" />
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <section class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">Beasiswa</h2>

        <div class="hidden md:grid md:grid-cols-3 gap-6">
            @foreach ($beasiswa as $item)
                <x-card :image="$item->scholarship_head_cover" :title="$item->scholarship_title" :by="$item->users->name" :date="$item->created_at" :description="$item->scholarship_description"
                    :link="route('guestbeasiswa.show', $item->id)" />
            @endforeach
        </div>

        <div class="md:hidden flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth px-4">
            @foreach ($beasiswa as $item)
                <div class="snap-start bg-white rounded-xl overflow-hidden shadow-lg flex-shrink-0 w-[80%]">
                    <x-card :image="$item->scholarship_head_cover" :title="$item->scholarship_title" :by="$item->users->name" :date="$item->created_at" :description="$item->scholarship_description"
                        :link="route('guestbeasiswa.show', $item->id)" />
                </div>
            @endforeach
        </div>
    </section>

    <div class="bg-white">
        <section class="max-w-7xl mx-auto px-6 py-12">
            <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">Info Lowongan</h2>

            <div class="hidden md:grid md:grid-cols-3 gap-6">
                @foreach ($lowongan as $item)
                    <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at" :description="$item->information_description"
                        :link="route('guestlowongan.show', $item->id)" />
                @endforeach
            </div>

            <div class="md:hidden flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth px-4">
                @foreach ($lowongan as $item)
                    <div class="snap-start bg-white rounded-xl overflow-hidden shadow-lg flex-shrink-0 w-[80%]">
                        <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at"
                            :description="$item->information_description" :link="route('guestlowongan.show', $item->id)" />
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
