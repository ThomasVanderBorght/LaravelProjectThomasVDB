<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Edit FAQ</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="vraagnaam" class="block font-medium">Question:</label>
                <input type="text" id="vraagnaam" name="vraagnaam" value="{{ $faq->vraagnaam }}" required class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="vraagbody" class="block font-medium">Answer:</label>
                <textarea id="vraagbody" name="vraagbody" required class="border p-2 w-full">{{ $faq->vraagbody }}</textarea>
            </div>

            <div class="mb-4">
                <label for="categorie_id" class="block font-medium">Category:</label>
                <select id="categorie_id" name="categorie_id" required class="border p-2 w-full">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $faq->categorie_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update FAQ</button>
        </form>
    </div>
</x-app-layout>
