<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LICT Ecommerce</title>
    <link rel="icon" href="{{ asset('images/lictlogo.png') }}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
        rel="stylesheet" />
</head>

<body>
    <nav class="bg-slate-900 text-white shadow z-40 w-100 px-8 md:px-auto sticky top-0">
        <div class="md:h-16 h-28 mx-auto  container flex items-center justify-between flex-wrap md:flex-nowrap">
            <div class="text-white md:order-1">
                <h2 class="text-white text-2xl font-extrabold">Hamro<span class="text-yellow-600">Sawari</span></h2>
            </div>
            <div class="text-white order-3 w-full md:w-auto md:order-2">
                <ul class="flex font-semibold justify-between">

                    <li class="md:px-4 md:py-2 text-white"><a href="{{route('home')}}">Home</a></li>
                    <li class="md:px-4 md:py-2 hover:text-slate-400"><a href="{{route('booking')}}">Booking</a></li>
                    <li class="md:px-4 md:py-2 hover:text-slate-400"><a href="#">History</a></li>
                    <li class="md:px-4 md:py-2 hover:text-slate-400"><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div class="order-2 flex space-x-4 md:order-3">
            @auth
                <span class="text-white">Hi! {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-slate-700 font-semibold hover:bg-slate-600 text-white rounded-xl flex items-center gap-2">
                        <span>Logout</span>
                    </button>
                </form>
            @else
                    <button class="px-4 py-2 font-semibold bg-green-700 hover:bg-green-800 text-white rounded-xl flex items-center gap-2">
                    <a href="{{ route('register') }}">Register</a>
                    </button>

                    <button class="px-4 py-2 bg-slate-700 font-semibold hover:bg-slate-600 text-white rounded-xl flex items-center gap-2">
                    <a href="/login">Login</a>
                    </button>
            @endauth
        </div>
        </div>
    </nav>

    @yield('content')

    <div class="bg-gray-900 text-gray-200 ">
        <div class="max-w-screen-lg px-4 sm:px-6 sm:grid md:grid-cols-4 sm:grid-cols-2 mx-auto">
            <div class="p-5">
                <h2 class="text-white text-2xl font-extrabold">Hamro<span class="text-yellow-600">Sawari</span></h2>

            </div>
            <div class="p-5">
                <div class="text-sm uppercase font-bold">Quick Links</div>
                <a class="my-3 block hover:text-teal-400" href="#">Home</a>
                <a class="my-3 block hover:text-teal-400" href="#">Booking</a>
                <a class="my-3 block hover:text-teal-400" href="#">Contact us <span class="text-teal-400 text-xs">New</span></a>
            </div>
            <div class="p-5">
                <div class="text-sm uppercase font-bold">Support</div>
                <a class="my-3 block hover:text-teal-400" href="#">Help Center</a>
                <a class="my-3 block hover:text-teal-400" href="#">Privacy Policy</a>
                <a class="my-3 block hover:text-teal-400" href="#">Conditions</a>
            </div>
            <div class="p-5">
                <div class="text-sm uppercase font-bold">Contact Us</div>
                <a class="my-3 block hover:text-teal-400" href="#">Nandita Travel Agency</a>
                <a class="my-3 block hover:text-teal-400" href="#">nanditatravelagency44@hamrosawari.com.np</a>
            </div>
        </div>
        <div class="flex justify-center space-x-3 py-5 border-t border-gray-600">
            <a href="#" aria-label="Twitter" class="w-6 text-gray-400 hover:text-teal-400">
            </a>
            <a href="#" aria-label="Facebook" class="w-6 text-gray-400 hover:text-teal-400">
            </a>
            <a href="#" aria-label="Instagram" class="w-6 text-gray-400 hover:text-teal-400">
            </a>
        </div>
    </div>

</body>

</html>