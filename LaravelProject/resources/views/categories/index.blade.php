<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorieën
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $categorie)
                <a href="{{ route('categories.show', $categorie->id) }}" class="block">
                <div class="bg-white  p-4 rounded-lg shadow-md flex flex-col items-center overflow-hidden transition transform hover:scale-105" style="width: 250px; text-align: center; border: 1px solid black;">  
                        <h2 class="text-lg font-bold text-gray-800">{{ $categorie->name }}</h2>
                        <p class="text-sm text-gray-600">{{ $categorie->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>