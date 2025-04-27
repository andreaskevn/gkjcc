@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
        <div class="relative text-center z-10">
            <h1 class="text-6xl font-bold">Komisi</h1>
        </div>
    </section>
    <div class="container mx-auto p-4">
        @if ($keesaan->count())
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-1 h-5 bg-yellow-400 mr-2"></div>
                    <h2 class="text-xl font-semibold">{{ $keesaan->first()->bidangs->bidang_name }}</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($keesaan as $item)
                        <x-card :image="$item->commission_head_cover" :title="$item->commission_name" :by="$item->users->name" :date="$item->created_at->format('d M Y')" :description="$item->commission_description"
                            :link="route('guestkomisi.show', $item->id)" />
                    @endforeach
                </div>
            </div>
        @endif

        {{-- PEMBINAAN --}}
        @if ($pembinaan->count())
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-1 h-5 bg-yellow-400 mr-2"></div>
                    <h2 class="text-xl font-semibold">{{ $pembinaan->first()->bidangs->bidang_name }}</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($pembinaan as $item)
                        <x-card :image="$item->commission_head_cover" :title="$item->commission_name" :by="$item->users->name" :date="$item->created_at->format('d M Y')" :description="$item->commission_description"
                            :link="route('guestkomisi.show', $item->id)" />
                    @endforeach
                </div>
            </div>
        @endif

        {{-- PENATALAYANAN --}}
        @if ($penatalayanan->count())
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-1 h-5 bg-yellow-400 mr-2"></div>
                    <h2 class="text-xl font-semibold">{{ $penatalayanan->first()->bidangs->bidang_name }}</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($penatalayanan as $item)
                        <x-card :image="$item->commission_head_cover" :title="$item->commission_name" :by="$item->users->name" :date="$item->created_at->format('d M Y')"
                            :description="$item->commission_description" :link="route('guestkomisi.show', $item->id)" />
                    @endforeach
                </div>
            </div>
        @endif

        {{-- KESAKSIAN --}}
        @if ($kesaksian->count())
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-1 h-5 bg-yellow-400 mr-2"></div>
                    <h2 class="text-xl font-semibold">{{ $kesaksian->first()->bidangs->bidang_name }}</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($kesaksian as $item)
                        <x-card :image="$item->commission_head_cover" :title="$item->commission_name" :by="$item->users->name" :date="$item->created_at->format('d M Y')"
                            :description="$item->commission_description" :link="route('guestkomisi.show', $item->id)" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
@endsection
