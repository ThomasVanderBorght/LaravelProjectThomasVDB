<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('admin.storeUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="name">Name:</label>
                    <input type="text" name="name" required class="border p-2 w-full mb-3">

                    <label for="username">Username:</label>
                    <input type="text" name="username" required class="border p-2 w-full mb-3">

                    <label for="email">Email:</label>
                    <input type="email" name="email" required class="border p-2 w-full mb-3">

                    <label for="password">Password:</label>
                    <input type="password" name="password" required class="border p-2 w-full mb-3">

                    <label for="type">User Type:</label>
                    <select name="type" class="border p-2 w-full mb-3">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>

                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" name="date_of_birth" class="border p-2 w-full mb-3">

                    <label for="about_me">About Me:</label>
                    <textarea name="about_me" class="border p-2 w-full mb-3"></textarea>

                    <label for="profile_picture">Profile Picture:</label>
                    <input type="file" name="profile_picture" accept="image/*" class="border p-2 w-full mb-3">

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>