<x-app-layout>
    <x-slot name="header">
        @auth
            <!-- Only show this section for logged-in users -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Search Users') }}
            </h2>
        @endauth
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <!-- Search Form -->
                <form action="{{ route('users.search') }}" method="GET" class="mb-6">
                    <div class="flex items-center space-x-2">
                        <input
                            type="text"
                            name="query"
                            placeholder="Search users by username or about me..."
                            class="w-full p-2 border rounded"
                            value="{{ request('query') }}"
                        />
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                            Search
                        </button>
                    </div>
                </form>

                <!-- Users List -->
                @if($users && count($users) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($users as $user)
                            <div class="bg-gray-100 p-4 rounded shadow">
                                <div class="flex items-center space-x-4">
                                    <img
                                        src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}"
                                        alt="{{ $user->username }}"
                                        class="w-16 h-16 rounded-full"
                                    />
                                    <div>
                                        <h3 class="text-lg font-semibold">{{ $user->username }}</h3>
                                        <p class="text-sm text-gray-600">{{ $user->about_me }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No users found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
