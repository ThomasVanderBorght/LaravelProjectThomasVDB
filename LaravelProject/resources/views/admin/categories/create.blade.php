<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Contact Us</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <!-- Category Selection -->
            <div class="mb-4">
                <label for="reason" class="block font-medium">Select a Category:</label>
                <select id="reason" name="reason" required class="border p-2 w-full" onchange="toggleUserReportField(this.value)">
                    <option value="">Select a reason</option>
                    <option value="general">General Inquiry</option>
                    <option value="bug_report">Bug Report</option>
                    <option value="user_report">User Report</option>
                </select>
                @error('reason') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Reported User (Only visible if User Report is selected) -->
            <div class="mb-4 hidden" id="userReportField">
                <label for="reported_user_id" class="block font-medium">Reported User (Enter Username):</label>
                <input type="text" id="reported_user" name="reported_user" class="border p-2 w-full">
                @error('reported_user') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Message -->
            <div class="mb-4">
                <label for="message" class="block font-medium">Your Message:</label>
                <textarea id="message" name="message" required class="border p-2 w-full h-32"></textarea>
                @error('message') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>

    <script>
        function toggleUserReportField(value) {
            const userReportField = document.getElementById('userReportField');
            userReportField.classList.toggle('hidden', value !== 'user_report');
        }
    </script>
</x-app-layout>

