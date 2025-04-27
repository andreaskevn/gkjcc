@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
        <div class="relative text-center z-10">
            <h1 class="text-6xl font-bold">Informasi Lowongan Pekerjaan</h1>
        </div>
    </section>
    <div class="container mx-auto p-4 my-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($lowongan as $item)
                <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at->format('d M Y')" :description="$item->information_description"
                    :link="route('guestlowongan.show', $item->id)" />
            @endforeach
        </div>
    </div>
@endsection
