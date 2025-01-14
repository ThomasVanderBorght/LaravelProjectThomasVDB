<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Edit News Article</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-medium">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="body" class="block font-medium">Content:</label>
                <textarea id="body" name="body" required class="border p-2 w-full h-32">{{ old('body', $news->body) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="news_picture" class="block font-medium">News Picture:</label>
                <input type="file" id="news_picture" name="news_picture" accept="image/*" class="border p-2 w-full">
                @if($news->news_picture)
                    <img src="{{ asset('storage/' . $news->news_picture) }}" alt="{{ $news->title }}" class="w-32 my-2">
                @endif
            </div>

            <div class="mb-4">
                <label for="publicationDate" class="block font-medium">Publication Date:</label>
                <input type="date" id="publicationDate" name="publicationDate" value="{{ old('publicationDate', $news->publicationDate) }}" required class="border p-2 w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update News</button>
        </form>
    </div>
</x-app-layout>
