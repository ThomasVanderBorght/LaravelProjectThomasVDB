<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laatste Nieuwtjes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($news->isEmpty())
                    <p class="text-gray-600">Er zijn momenteel geen nieuwsberichten.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($news as $article)
                            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                                @if($article->news_picture)
                                    <div class="flex justify-center">
                                        <img src="{{ asset('storage/' . $article->news_picture) }}" 
                                            alt="{{ $article->title }}" 
                                            class="w-full h-100 object-cover rounded-lg shadow-md">
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <h3 class="text-lg font-bold text-gray-800">{{ $article->title }}</h3>
                                    <p class="text-sm text-gray-600">
                                        Gepubliceerd op: {{ \Carbon\Carbon::parse($article->publicationDate)->format('d-m-Y') }}
                                    </p>
                                    <p class="text-gray-700">{{ Str::limit($article->body, 120) }}</p>
                                    
                                    <div class="mt-4">
                                        <a href="{{ route('news.show', $article) }}" 
                                           class="text-blue-500 font-semibold hover:underline">
                                            Lees Meer →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>