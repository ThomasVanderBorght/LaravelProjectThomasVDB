<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Create FAQ</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="vraagnaam" class="block font-medium">Question:</label>
                <input type="text" id="vraagnaam" name="vraagnaam" required class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="vraagbody" class="block font-medium">Answer:</label>
                <textarea id="vraagbody" name="vraagbody" required class="border p-2 w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="categorie_id" class="block font-medium">Category:</label>
                <select id="categorie_id" name="categorie_id" required class="border p-2 w-full">
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create FAQ</button>
        </form>
    </div>
</x-app-layout>
