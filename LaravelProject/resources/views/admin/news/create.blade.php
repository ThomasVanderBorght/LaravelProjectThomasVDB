<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Create News Article</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium">Title:</label>
                <input type="text" id="title" name="title" required class="border p-2 w-full">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="block font-medium">Content:</label>
                <textarea id="body" name="body" required class="border p-2 w-full h-32"></textarea>
                @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="news_picture" class="block font-medium">news picture:</label>
                <input type="file" id="news_picture" name="news_picture" accept="image/*" class="border p-2 w-full">
                @error('news_picture') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="publicationDate" class="block font-medium">Published Date:</label>
                <input type="date" id="publicationDate" name="publicationDate" required class="border p-2 w-full">
                @error('publicationDate') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create News</button>
        </form>
    </div>
</x-app-layout>