<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cheese Factory</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif
</head>
<body class="font-sans antialiased bg-yellow-50 text-gray-800">
    <header class="bg-yellow-300 shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">
                <a href="/">Cheese Factory</a>
            </h1>
            <nav class="flex space-x-4">
                <a href="/kazen" class="text-lg hover:text-yellow-700">Our Cheeses</a>
                <a href="/contact" class="text-lg hover:text-yellow-700">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-lg hover:text-yellow-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg hover:text-yellow-700">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-lg hover:text-yellow-700">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <main class="mt-6">
    <section class="container mx-auto px-6 py-16">
    <h3 class="text-3xl font-semibold text-gray-800 text-center mb-12">Our Cheeses</h3>

    <!-- Category Filter -->
    <div class="mb-8 flex justify-center">
        <a href="{{ route('cheeses.index') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
            All Cheeses
        </a>
        @foreach ($cheeseCategories as $category)
            <a href="{{ route('cheeses.index', ['category' => $category->id]) }}" 
               class="ml-4 px-4 py-2 bg-yellow-200 text-gray-800 rounded-lg hover:bg-yellow-300">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Cheese Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($kazen as $cheese)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $cheese->cheesePicture) }}" alt="{{ $cheese->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-2xl font-semibold text-gray-800">{{ $cheese->name }}</h4>
                    <p class="text-gray-600 mt-2">{{ $cheese->description }}</p>
                    <p class="text-sm text-gray-500 mt-1">Brand: {{ $cheese->brand }}</p>
                    <p class="text-sm text-gray-500 mt-1">Age: {{ $cheese->age }} months</p>
                    @if ($cheese->categorie)
                        <p class="text-sm text-gray-500 mt-1">Category: {{ $cheese->categorie->name }}</p>
                    @endif
                    <a href="/products/{{ Str::slug($cheese->name) }}" 
                       class="text-yellow-600 hover:underline mt-4 inline-block">
                        Learn More
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600 col-span-3">No cheeses available.</p>
        @endforelse
    </div>
</section>


        <section class="bg-yellow-100 py-16">
            <div class="container mx-auto px-6 text-center">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6">Visit Us</h3>
                <p class="text-gray-700">Come to our factory and enjoy a cheese-tasting experience like no other!</p>
                <p class="mt-4 text-gray-600">123 Cheese Lane, Cheesetown, CT</p>
                <p class="mt-1 text-gray-600">Phone: (123) 456-7890</p>
                <a href="/contact" class="mt-6 inline-block px-6 py-3 text-white bg-yellow-600 rounded-lg shadow-lg hover:bg-yellow-700">Get Directions</a>
            </div>
        </section>
    </main>

    <footer class="bg-yellow-300 py-6">
        <div class="container mx-auto text-center text-gray-800">
            <p>&copy; {{ date('Y') }} Cheese Factory. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
