<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard - Manage Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif
                
                <a href="{{ route('admin.users.createUser') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New User</a>

                <table class="min-w-full bg-white border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border">Name</th>
                            <th class="py-2 px-4 border">Username</th>
                            <th class="py-2 px-4 border">Email</th>
                            <th class="py-2 px-4 border">Role</th>
                            <th class="py-2 px-4 border">Date of Birth</th>
                            <th class="py-2 px-4 border">About Me</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border">
                            <td class="py-2 px-4">{{ $user->name }}</td>
                            <td class="py-2 px-4">{{ $user->username }}</td>
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4 font-bold {{ $user->type === 'admin' ? 'text-red-500' : 'text-gray-700' }}">
                                {{ ucfirst($user->type) }}
                            </td>
                            <td class="py-2 px-4">{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
                            <td class="py-2 px-4 text-sm">{{ $user->about_me ?? 'No bio available' }}</td>
                            <td class="py-2 px-4 flex space-x-2">
                                @if($user->type === 'user')
                                    <form action="{{ route('admin.users.makeAdmin', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                                            Make Admin
                                        </button>
                                    </form>
                                @elseif($user->type === 'admin')
                                    <form action="{{ route('admin.users.removeAdmin', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                            Remove Admin
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>