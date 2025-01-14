<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-4">
            Kazen {{ $selectedCategory ? 'in ' . $selectedCategory->name : '' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Category Selection -->
                <div class="flex space-x-4 mb-6">
                    <a href="{{ route('cheeses.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                        Show All Cheeses
                    </a>
                    @foreach($cheeseCategories as $category)
                        <a href="{{ route('cheeses.index', ['category' => $category->id]) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Display Cheeses -->
                @if($kazen->isEmpty())
                    <p class="text-gray-600">Geen kazen beschikbaar in deze categorie.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($kazen as $kaas)
                            <div class="bg-white p-4 rounded-lg shadow-md border border-black">
                                <h2 class="text-lg font-bold text-gray-800">{{ $kaas->name }}</h2>
                                <p class="text-sm text-gray-600">{{ $kaas->description }}</p>
                                <p class="text-sm font-semibold">Leeftijd: {{ $kaas->age }} jaar</p>
                                <p class="text-sm font-semibold">Merk: {{ $kaas->brand }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
