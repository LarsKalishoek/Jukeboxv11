<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login / Register</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- TailwindCSS / Your CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-black dark:text-white">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md p-6 bg-white dark:bg-zinc-900 rounded-xl shadow-md space-y-6">
            <h1 class="text-2xl font-semibold text-center">Welcome</h1>
            @if (Route::has('login'))
                <div class="flex flex-col space-y-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="w-full inline-flex justify-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Go to Dashboard
                        </a>
                    @else
                        <!-- Login Button -->
                        <a href="{{ route('login') }}"
                           class="w-full inline-flex justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <!-- Register Button -->
                            <a href="{{ route('register') }}"
                               class="w-full inline-flex justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
