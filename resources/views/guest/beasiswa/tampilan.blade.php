@extends('layouts.guest')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center mb-6">Beasiswa</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($beasiswa as $item)
                <x-card :image="$item->scholarship_head_cover" :title="$item->scholarship_title" :by="$item->users->name" :date="$item->created_at->format('d M Y')" :description="$item->scholarship_description"
                    :link="route('guestbeasiswa.show', $item->id)" />
            @endforeach
        </div>
    </div>
@endsection
