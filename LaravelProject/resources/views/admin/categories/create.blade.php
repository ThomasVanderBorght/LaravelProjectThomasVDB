<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Create Category</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-medium">Category Name:</label>
                <input type="text" id="name" name="name" required class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description:</label>
                <textarea id="description" name="description" class="border p-2 w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block font-medium">Type:</label>
                <select id="type" name="type" required class="border p-2 w-full">
                    <option value="cheese">Cheese</option>
                    <option value="faq">FAQ</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Category</button>
        </form>
    </div>
</x-app-layout>
