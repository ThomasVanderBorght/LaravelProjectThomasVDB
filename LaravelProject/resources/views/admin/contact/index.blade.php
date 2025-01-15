<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard - Contact Messages
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif

                <table class="min-w-full bg-white border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border">From</th>
                            <th class="py-2 px-4 border">Reason</th>
                            <th class="py-2 px-4 border">Reported User</th>
                            <th class="py-2 px-4 border">Message</th>
                            <th class="py-2 px-4 border">Submitted At</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr class="border">
                        <td class="py-2 px-4">{{ $contact->user->name}}</td>
                        <td class="py-2 px-4">{{ ucfirst(str_replace('_', ' ', $contact->reason)) }}</td>
                            <td class="py-2 px-4">
                                {{ $contact->reportedUser ? $contact->reportedUser->name : 'N/A' }}
                            </td>
                            <td class="py-2 px-4">{{ $contact->message }}</td>
                            <td class="py-2 px-4">{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                            <td class="py-2 px-4">
                                <form action="#" method="POST">
                                    @csrf
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
