@extends('layouts.guest')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center mb-6">Pengumuman</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($pengumuman as $item)
                <x-card :image="$item->information_head_cover" :title="$item->information_title" :by="$item->user->name" :date="$item->created_at->format('d M Y')" :description="$item->information_description"
                    :link="route('guestpengumuman.show', $item->id)" />
            @endforeach
        </div>
    </div>
@endsection
