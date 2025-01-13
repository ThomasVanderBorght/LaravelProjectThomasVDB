<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Create News Article</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block font-medium">Title:</label>
                <input type="text" id="title" name="title" required class="border p-2 w-full">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block font-medium">Content:</label>
                <textarea id="content" name="content" required class="border p-2 w-full h-32"></textarea>
                @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block font-medium">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" class="border p-2 w-full">
                @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Published Date -->
            <div class="mb-4">
                <label for="published_at" class="block font-medium">Published Date:</label>
                <input type="date" id="published_at" name="published_at" required class="border p-2 w-full">
                @error('published_at') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create News</button>
        </form>
    </div>
</x-app-layout>