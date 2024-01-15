<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/new" method="POST">
                        @csrf


                        @foreach ($led as $pin)
                            <label class="m-5" for="pin{{ $pin->id }}">Light {{ $pin->id }}</label>
                            <select style="margin: 20px; width: 95%;" name="pin{{ $pin->id }}"
                                id="{{ $pin->id }}">
                                @if ($pin->status == 'ON')
                                    <option value="ON" selected>ON</option>
                                    <option value="OFF">OFF</option>
                                @elseif($pin->status == 'OFF')
                                    <option value="OFF" selected>OFF</option>
                                    <option value="ON">ON</option>
                                @endif

                            </select>
                            <br>
                        @endforeach


                        <button style="border: 1px solid black; border-radius: 100px; padding: 10px 20px;"
                            class="border" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1><strong> Select a date and time:</strong></h1>
                    {{-- schedule start --}}
                    <form id="scheduleForm">
                        <label for="scheduleDateTime">Light 1: </label>
                        <input type="datetime-local" id="scheduleDateTime" required />

                        <button
                            style="margin-left: 20px; border: 1px solid black; border-radius: 100px; padding: 10px 20px;"
                            type="button" onclick="scheduleTask()" id="scheduleButton" <!-- Add an ID for easy
                            reference -->

                            Set
                        </button>
                    </form>

                    <div id="output"></div>

                    <script>
                        function scheduleTask() {
                            // Get the scheduled date and time from the form
                            const scheduledDateTime = document.getElementById("scheduleDateTime").value;

                            // Check if the input is not empty before scheduling the task
                            if (!scheduledDateTime) {
                                alert("Please select a date and time.");
                                return;
                            }

                            // Parse the date and time string
                            const scheduledTime = new Date(scheduledDateTime).getTime();

                            // Get the current time
                            const currentTime = new Date().getTime();

                            // Calculate the delay in milliseconds
                            const delay = scheduledTime - currentTime;

                            // Clear any existing scheduled task
                            clearTimeout(window.scheduledTask);

                            // Schedule the task to display "Hello, World!" after the specified delay
                            window.scheduledTask = setTimeout(function() {
                                displayHelloWorld();
                            }, delay);

                            // Provide feedback to the user
                            document.getElementById("output").innerText = "Task scheduled!";

                            // Optionally, you can clear the form
                            document.getElementById("scheduleForm").reset();
                        }

                        function displayHelloWorld() {
                            // Update the content on the page
                            document.getElementById("output").innerText = "Hello, World!";
                        }

                        // Add an event listener to the input to enable/disable the button dynamically
                        document.getElementById("scheduleDateTime").addEventListener("input", function() {
                            const scheduleButton = document.getElementById("scheduleButton");
                            scheduleButton.disabled = !this.value; // Disable if the input is empty
                        });
                    </script>

                    {{-- schedule end --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
