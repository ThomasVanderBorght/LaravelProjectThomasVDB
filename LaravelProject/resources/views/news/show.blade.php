<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwsbericht: {{ $news->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <p class="text-sm text-gray-600">
                        Gepubliceerd op: {{ \Carbon\Carbon::parse($news->publicationDate)->format('d-m-Y') }}
                    </p>
                </div>

                @if($news->news_picture)
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $news->news_picture) }}" alt="{{ $news->title }}" class="w-1/2 h-100px rounded-lg shadow-md">
                    </div>
                @endif

                <div class="mt-6">
                    <h3 class="text-lg font-bold text-gray-800">Inhoud</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $news->body }}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>