<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Laatste nieuwtjes</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        @foreach($news as $article)
            <div class="border p-4 mb-4">
                <h3 class="text-lg font-bold">{{ $article->title }}</h3>
                <p class="text-sm text-gray-600">{{ $article->published_at }}</p>
                @if($article->news_picture)
                    <img src="{{ asset('storage/' . $article->news_article) }}" alt="{{ $article->title }}" class="w-64 my-2">
                @endif
                <p>{{ Str::limit($article->body, 100) }}</p>
                <a href="{{ route('news.show', $article) }}" class="text-blue-500">Read More</a>
            </div>
        @endforeach
    </div>
</x-app-layout>