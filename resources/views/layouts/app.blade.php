<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
        rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased dark:bg-slate-800">
    <div class="fixed lg:absolute z-50 right-4 top-5">

        <div class="relative">
            <div class="flex items-center gap-x-2">
                <div>
                    <button id="theme-toggle" type="button"
                        class="text-gray-300 dark:text-gray-300 hover:bg-gray-400 border-gray-300 dark:hover:bg-gray-700 dark:border-gray-700 focus:outline-none rounded-lg text-sm  lg:py-0.5 lg:px-3 py-0.5 px-2">
                        <p id="theme-toggle-dark-icon" class="hidden  lg:text-sm">
                            <i class="ri-moon-fill"></i>
                        </p>
                        <p id="theme-toggle-light-icon" class="hidden  lg:text-sm">
                            <i class="ri-sun-fill"></i>
                        </p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('layouts.alert') --}}
    <div class="flex">
        <nav class="w-60 h-screen shadow-lg bg-slate-900">
            <div class="flex justify-center items-center py-6">
                <h2 class="text-white text-2xl font-extrabold">
                    Hamro<span class="text-yellow-600">Sawari</span>
                </h2>
            </div>

            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-dashboard-line mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('bus-route.index') }}" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-route-line mr-3"></i>
                        Bus-Route
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-file-list-2-line mr-3"></i>
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('addbus.index') }}" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-bus-line mr-3"></i>
                        Add Bus
                    </a>
                </li>
                <li>
                    <a href="{{ route('schedule.index') }}" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-calendar-line mr-3"></i>
                        Schedule
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-bookmark-line mr-3"></i>
                        Booked
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="ri-user-line mr-3"></i>
                        Users
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-3 rounded-lg text-lg font-semibold text-gray-300 hover:bg-red-500 hover:text-white transition duration-300">
                            <i class="ri-logout-box-line mr-3"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <div class="p-4 flex-1">
            @yield('content')
        </div>
    </div>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>
</body>

</html>