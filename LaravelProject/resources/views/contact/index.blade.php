<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mijn Contactformulieren
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif

                <a href="{{ route('contact.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    Create Contact form
                </a>


                <h3 class="text-lg font-semibold mb-4">your sent contact froms</h3>

                @if($contacts->isEmpty())
                    <p class="text-gray-600">You haven't sent any contact forms yet</p>
                @else
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border">reason</th>
                                <th class="py-2 px-4 border">message</th>
                                <th class="py-2 px-4 border">sent at</th>
                                <th class="py-2 px-4 border">response</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="py-2 px-4 border">{{ ucfirst(str_replace('_', ' ', $contact->reason)) }}</td>
                                    <td class="py-2 px-4 border">{{ $contact->message }}</td>
                                    <td class="py-2 px-4 border">{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                                    <td class="py-2 px-4 border">
                                        @if($contact->response)
                                            <p class="text-gray-800">{{ $contact->response }}</p>
                                            <p class="text-sm text-gray-500">answered by admin on {{ $contact->updated_at->format('d-m-Y H:i') }}</p>
                                        @else
                                            <p class="text-gray-500">you didn't receive a response yet</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
