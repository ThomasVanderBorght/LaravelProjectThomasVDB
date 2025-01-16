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
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('storage/' . $news->news_picture) }}" alt="{{ $news->title }}" class="w-1/2 h-auto rounded-lg shadow-md">
                    </div>
                @endif

                <div class="mt-6">
                    <h3 class="text-lg font-bold text-gray-800">Inhoud</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $news->body }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Comments</h3>

                @auth
                    <form action="{{ route('comments.store', $news) }}" method="POST" class="mb-6">
                        @csrf
                        <textarea
                            name="content"
                            rows="4"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Laat een reactie achter..."
                            required
                        ></textarea>
                        <button
                            type="submit"
                            class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                        >
                            Plaatsen
                        </button>
                    </form>
                @else
                    <p class="text-gray-600">Log in om een reactie te plaatsen.</p>
                @endauth

                @if ($news->comments->count())
                    @foreach ($news->comments as $comment)
                        <div class="mb-4 border-b pb-4">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <p class="text-sm text-gray-600">
                                Geplaatst door {{ $comment->user->name }} op {{ $comment->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-600">Er zijn nog geen reacties.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
