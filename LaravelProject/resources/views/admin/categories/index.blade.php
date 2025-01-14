<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif

                <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    Create Category
                </a>

                <table class="min-w-full bg-white border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border">Name</th>
                            <th class="py-2 px-4 border">Type</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="border">
                            <td class="py-2 px-4">{{ $category->name }}</td>
                            <td class="py-2 px-4">{{ ucfirst($category->type) }}</td>
                            <td class="py-2 px-4 flex space-x-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
