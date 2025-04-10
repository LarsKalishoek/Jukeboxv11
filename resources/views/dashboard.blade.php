@extends('layouts.default')

@section('content')
    <div class="py-12 w-full">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-indigo-100 via-white to-indigo-100 shadow-lg rounded-2xl p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">
                    Welcome, {{ Auth::user()->name ?? 'Trainer' }}!
                </h1>

                <p class="text-lg text-gray-700">
                    Today is <span id="day" class="font-semibold text-indigo-600"></span>, 
                    and the current time is <span id="time" class="font-semibold text-indigo-600"></span>.
                </p>
            </div>
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long' };
            const day = new Intl.DateTimeFormat('en-US', options).format(now);
            const time = now.toLocaleTimeString();

            document.getElementById('day').textContent = day;
            document.getElementById('time').textContent = time;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000); // update every second
    </script>
@endsection
