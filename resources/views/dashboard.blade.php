<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/new" method="POST">
                        @csrf


                        @foreach ($led as $pin)
                            <label for="pin{{ $pin->id }}">Pin {{ $pin->id }}</label>
                            <select name="pin{{ $pin->id }}" id="{{ $pin->id }}">
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


                        <button class="border" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
