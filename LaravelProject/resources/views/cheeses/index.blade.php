<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-4">
            Kazen
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($kazen as $kaas)
                <div class="bg-white  p-4 rounded-lg shadow-md flex flex-col items-center overflow-hidden transition transform hover:scale-105" style="width: 250px; text-align: center; border: 1px solid black;"> 
                    <h2 class="text-lg font-bold text-gray-800">{{ $kaas->name }}</h2>
                    <h2 class="text-lg font-bold text-gray-800">{{ $kaas->age }}</h2>
                    <h2 class="text-lg font-bold text-gray-800">{{ $kaas->brand }}</h2>
                    <p class="text-sm text-gray-600">{{ $kaas->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>