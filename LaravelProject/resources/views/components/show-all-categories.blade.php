<div class="flex space-x-4 mb-6">
    <a href="{{ route($routeName) }}" 
       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
        Show All {{ ucfirst($label) }}
    </a>

    @foreach($categories as $category)
            <a href="{{ route($routeName, ['category' => $category->id]) }}"  
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            {{ $category->name }}
        </a>
    @endforeach
</div>