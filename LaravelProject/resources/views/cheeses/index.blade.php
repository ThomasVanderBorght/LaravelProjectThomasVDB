<x-index-layout :title="'Kazen ' . ($selectedCategory ? 'in ' . $selectedCategory->name : '')">

    <x-show-all-categories 
    route-name="cheeses.index" 
    :categories="$cheeseCategories"
    :selected-category="$selectedCategory"
    label="Cheeses"/>

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

</x-index-layout>