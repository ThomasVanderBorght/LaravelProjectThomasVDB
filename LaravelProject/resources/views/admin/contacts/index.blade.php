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
                            <th class="py-2 px-4 border">Response</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr class="border">
                            <td class="py-2 px-4">{{ $contact->user->name }}</td>
                            <td class="py-2 px-4">{{ ucfirst(str_replace('_', ' ', $contact->reason)) }}</td>
                            <td class="py-2 px-4">
                                {{ $contact->reportedUser ? $contact->reportedUser->name : 'N/A' }}
                            </td>
                            <td class="py-2 px-4">{{ $contact->message }}</td>
                            <td class="py-2 px-4">{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                            <td class="py-2 px-4">
                                @if($contact->response)
                                    <p class="text-sm text-gray-600">{{ $contact->response }}</p>
                                    <p class="text-xs text-gray-400">  By {{ $contact->ResponsePerson ? $contact->ResponsePerson->name : 'N/A' }}</p>
                                @else
                                    <form action="{{ route('admin.contacts.respond', $contact->id) }}" method="POST">
                                        @csrf
                                        <textarea 
                                            name="response" 
                                            rows="2" 
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                            placeholder="Type your response here..."
                                            required
                                        ></textarea>
                                        <button 
                                            type="submit" 
                                            class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                                        >
                                            Respond
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                    >
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