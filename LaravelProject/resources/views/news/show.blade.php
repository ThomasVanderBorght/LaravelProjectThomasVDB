<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">{{ $news->title }}</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <p class="text-sm text-gray-600">{{ $news->published_at }}</p>
        @if($news->news_picture)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-64 my-2">
        @endif
        <p>{{ $news->body }}</p>
    </div>
</x-app-layout>