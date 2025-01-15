<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Contact Us</h2>
    </x-slot>

    <div class="container mx-auto p-6">
        @if(session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <!-- Contact Reason Dropdown -->
            <div class="mb-4">
                <label for="reason" class="block font-medium">Select a Contact Reason:</label>
                <select id="reason" name="reason" required class="border p-2 w-full" onchange="toggleUserReportField()">
                    <option value="" disabled selected>Select a reason</option>
                    <option value="general">General Inquiry</option>
                    <option value="support">Technical Support</option>
                    <option value="feedback">Feedback & Suggestions</option>
                    <option value="business">Business Inquiry</option>
                    <option value="report_user">Report a User</option> <!-- New Option -->
                </select>
                @error('reason') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Reported Username Field (Hidden by Default) -->
            <div class="mb-4 hidden" id="reportedUserField">
                <label for="reported_user" class="block font-medium">Username of Reported User:</label>
                <input type="text" id="reported_user" name="reported_user" class="border p-2 w-full">
                @error('reported_user') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Message Field -->
            <div class="mb-4">
                <label for="message" class="block font-medium">Your Message:</label>
                <textarea id="message" name="message" required class="border p-2 w-full h-32"></textarea>
                @error('message') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Submit
            </button>
        </form>
    </div>

    <!-- JavaScript to Toggle Reported User Field -->
    <script>
        function toggleUserReportField() {
            var reasonDropdown = document.getElementById("reason");
            var userReportField = document.getElementById("reportedUserField");

            if (reasonDropdown.value === "report_user") {
                userReportField.classList.remove("hidden");
            } else {
                userReportField.classList.add("hidden");
            }
        }
    </script>
</x-app-layout>
