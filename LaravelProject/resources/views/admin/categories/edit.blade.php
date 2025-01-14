<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Edit Category</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium">Category Name:</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" required class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description:</label>
                <textarea id="description" name="description" class="border p-2 w-full">{{ $category->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block font-medium">Type:</label>
                <select id="type" name="type" required class="border p-2 w-full">
                    <option value="cheese" {{ $category->type == 'cheese' ? 'selected' : '' }}>Cheese</option>
                    <option value="faq" {{ $category->type == 'faq' ? 'selected' : '' }}>FAQ</option>
                </select>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Category</button>
        </form>
    </div>
</x-app-layout>