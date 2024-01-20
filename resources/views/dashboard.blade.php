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
                    {{-- schedule start  1 --}}
                    <form id="scheduleForm_1" method="POST" action="/setSched/1">
                        @csrf
                        <label style="margin-right: 20px;" for="scheduleDateTime1">Light 1: </label>
                        <input type="datetime-local" id="scheduleDateTime1" name="schedule" required />

                        <select style="margin: 20px; width: 15%;" name="setTo" id="sched{{ $led[0]->id }}">
                            @if ($led[0]->status == 'ON')
                                <option value="ON" selected>ON</option>
                                <option value="OFF">OFF</option>
                            @elseif($led[0]->status == 'OFF')
                                <option value="OFF" selected>OFF</option>
                                <option value="ON">ON</option>
                            @endif

                        </select>

                        <button
                            style="margin-left: 10px; border: 1px solid black; border-radius: 100px; padding: 10px 20px;"
                            type="submit">
                            Set
                        </button>
                    </form>

                    <div id="scheduled_1">
                        @if ($scheduler[0]->schedule != null)
                            <span>Schedule: Turn <strong>{{ $scheduler[0]->setTo }}</strong> at
                                <strong>{{ $scheduler[0]->schedule }}</strong></span>
                            <form action="/delete-sched/1" method="POST">
                                @csrf
                                <button
                                    style="color: red; margin-top: 10px; border: 1px solid red; border-radius: 100px; padding: 10px 40px;"
                                    type="submit">Remove Schedule</button>
                            </form>
                            <br><br>
                            <hr>
                        @else
                            <span>Schedule: None</span>
                            <br><br>
                            <hr>
                        @endif
                    </div>

                    {{-- Schedule 2 --}}
                    <form id="scheduleForm_2" method="POST" action="/setSched/2">
                        @csrf
                        <label style="margin-right: 20px;" for="scheduleDateTime2">Light 2: </label>
                        <input type="datetime-local" id="scheduleDateTime2" name="schedule" required />

                        <select style="margin: 20px; width: 15%;" name="setTo" id="sched{{ $led[1]->id }}">
                            @if ($led[1]->status == 'ON')
                                <option value="ON" selected>ON</option>
                                <option value="OFF">OFF</option>
                            @elseif($led[1]->status == 'OFF')
                                <option value="OFF" selected>OFF</option>
                                <option value="ON">ON</option>
                            @endif

                        </select>

                        <button
                            style="margin-left: 10px; border: 1px solid black; border-radius: 100px; padding: 10px 20px;"
                            type="submit">
                            Set
                        </button>
                    </form>

                    <div id="scheduled_2">
                        @if ($scheduler[1]->schedule != null)
                            <span>Schedule: Turn <strong>{{ $scheduler[1]->setTo }}</strong> at
                                <strong>{{ $scheduler[1]->schedule }}</strong></span>
                            <form action="/delete-sched/2" method="POST">
                                @csrf
                                <button
                                    style="color: red; margin-top: 10px; border: 1px solid red; border-radius: 100px; padding: 10px 40px;"
                                    type="submit">Remove Schedule</button>
                            </form>
                            <br><br>
                            <hr>
                        @else
                            <span>Schedule: None</span>
                            <br><br>
                            <hr>
                        @endif
                    </div>

                    {{-- Schedule 3 --}}
                    <form id="scheduleForm_3" method="POST" action="/setSched/3">
                        @csrf
                        <label style="margin-right: 20px;" for="scheduleDateTime3">Light 3: </label>
                        <input type="datetime-local" id="scheduleDateTime3" name="schedule" required />

                        <select style="margin: 20px; width: 15%;" name="setTo" id="sched{{ $led[2]->id }}">
                            @if ($led[2]->status == 'ON')
                                <option value="ON" selected>ON</option>
                                <option value="OFF">OFF</option>
                            @elseif($led[2]->status == 'OFF')
                                <option value="OFF" selected>OFF</option>
                                <option value="ON">ON</option>
                            @endif

                        </select>

                        <button
                            style="margin-left: 10px; border: 1px solid black; border-radius: 100px; padding: 10px 20px;"
                            type="submit">
                            Set
                        </button>
                    </form>

                    <div id="scheduled_3">
                        @if ($scheduler[2]->schedule != null)
                            <span>Schedule: Turn <strong>{{ $scheduler[2]->setTo }}</strong> at
                                <strong>{{ $scheduler[2]->schedule }}</strong></span>
                            <form action="/delete-sched/3" method="POST">
                                @csrf
                                <button
                                    style="color: red; margin-top: 10px; border: 1px solid red; border-radius: 100px; padding: 10px 40px;"
                                    type="submit">Remove Schedule</button>
                            </form>
                            <br><br>
                            <hr>
                        @else
                            <span>Schedule: None</span>
                            <br><br>
                            <hr>
                        @endif
                    </div>

                    {{-- Schedule 4 --}}
                    <form id="scheduleForm_4" method="POST" action="/setSched/4">
                        @csrf
                        <label style="margin-right: 20px;" for="scheduleDateTime4">Light 4: </label>
                        <input type="datetime-local" id="scheduleDateTime4" name="schedule" required />

                        <select style="margin: 20px; width: 15%;" name="setTo" id="sched{{ $led[3]->id }}">
                            @if ($led[3]->status == 'ON')
                                <option value="ON" selected>ON</option>
                                <option value="OFF">OFF</option>
                            @elseif($led[3]->status == 'OFF')
                                <option value="OFF" selected>OFF</option>
                                <option value="ON">ON</option>
                            @endif

                        </select>

                        <button
                            style="margin-left: 10px; border: 1px solid black; border-radius: 100px; padding: 10px 20px;"
                            type="submit">
                            Set
                        </button>
                    </form>

                    <script>
                        //Form 1 ------------------------------------------------------
                        document.getElementById('scheduleForm_1').addEventListener('submit', function(e) {
                            e.preventDefault(); // prevent the form from submitting normally

                            var dateTimeInput = document.getElementById('scheduleDateTime1');
                            var currentDate = new Date();
                            var inputDate = new Date(dateTimeInput.value);

                            var diffInMinutes = (inputDate - currentDate) / (60 * 1000); // convert milliseconds to minutes


                            // Store the delay in the session
                            sessionStorage.setItem('delay1', diffInMinutes);

                            // Submit the form
                            this.submit();
                            //alert(diffInMinutes);
                        });
                        //Form 2 ------------------------------------------------------
                        document.getElementById('scheduleForm_2').addEventListener('submit', function(e) {
                            e.preventDefault(); // prevent the form from submitting normally

                            var dateTimeInput = document.getElementById('scheduleDateTime2');
                            var currentDate = new Date();
                            var inputDate = new Date(dateTimeInput.value);

                            var diffInMinutes = (inputDate - currentDate) / (60 * 1000); // convert milliseconds to minutes


                            // Store the delay in the session
                            sessionStorage.setItem('delay2', diffInMinutes);

                            // Submit the form
                            this.submit();
                            //alert(diffInMinutes);
                        });
                        //Form 3 ------------------------------------------------------
                        document.getElementById('scheduleForm_3').addEventListener('submit', function(e) {
                            e.preventDefault(); // prevent the form from submitting normally

                            var dateTimeInput = document.getElementById('scheduleDateTime3');
                            var currentDate = new Date();
                            var inputDate = new Date(dateTimeInput.value);

                            var diffInMinutes = (inputDate - currentDate) / (60 * 1000); // convert milliseconds to minutes


                            // Store the delay in the session
                            sessionStorage.setItem('delay3', diffInMinutes);

                            // Submit the form
                            this.submit();
                            //alert(diffInMinutes);
                        });
                        //Form 4 ------------------------------------------------------
                        document.getElementById('scheduleForm_4').addEventListener('submit', function(e) {
                            e.preventDefault(); // prevent the form from submitting normally

                            var dateTimeInput = document.getElementById('scheduleDateTime4');
                            var currentDate = new Date();
                            var inputDate = new Date(dateTimeInput.value);

                            var diffInMinutes = (inputDate - currentDate) / (60 * 1000); // convert milliseconds to minutes


                            // Store the delay in the session
                            sessionStorage.setItem('delay4', diffInMinutes);

                            // Submit the form
                            this.submit();
                            //alert(diffInMinutes);
                        });

                        //set up timer
                        window.onload = function() {
                            var delays = ['delay1', 'delay2', 'delay3', 'delay4'];

                            delays.forEach(function(delayKey) {
                                var delay = sessionStorage.getItem(delayKey);

                                if (delay !== null) {
                                    // There is a delay item in the session storage
                                    // Convert the delay from string back to number
                                    delay = parseFloat(delay);
                                    //alert(delay);

                                    // Create a timer that decreases every second
                                    var timer = setInterval(function() {
                                        delay -= 1 / 60; // decrease the delay by 1 second

                                        // If the delay is 0 or negative, clear the interval and show an alert
                                        if (delay <= 0) {
                                            clearInterval(timer);
                                            //alert("Time's up!");
                                            sessionStorage.removeItem(delayKey);
                                            location.reload();
                                        }
                                    }, 1000); // 1000 milliseconds = 1 second
                                }
                            });
                        };
                    </script>



                    <div id="scheduled_4">
                        @if ($scheduler[3]->schedule != null)
                            <span>Schedule: Turn <strong>{{ $scheduler[3]->setTo }}</strong> at
                                <strong>{{ $scheduler[3]->schedule }}</strong></span>
                            <form action="/delete-sched/4" method="POST">
                                @csrf
                                <button
                                    style="color: red; margin-top: 10px; border: 1px solid red; border-radius: 100px; padding: 10px 40px;"
                                    type="submit">Remove Schedule</button>
                            </form>
                            <br><br>
                            <hr>
                        @else
                            <span>Schedule: None</span>
                            <br><br>
                            <hr>
                        @endif
                    </div>



                    {{-- schedule end --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
