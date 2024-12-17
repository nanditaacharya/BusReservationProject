<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisan Tools - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .login-photo {
            background-image: url('/path/to/your/image.jpg');
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-6xl mx-4 sm:mx-auto bg-white shadow-lg sm:rounded-lg flex overflow-hidden my-10">
        <!-- Image Section -->
        <div class="flex-1 bg-indigo-100 hidden lg:flex">
            <div class="w-full bg-cover h-full bg-center login-photo">
                <img src="{{ asset('images/random/bus.jpeg') }}" alt="Login Photo" class="object-cover h-full w-full">
            </div>
        </div>
        
        <!-- Form Section -->
        <div class="lg:w-1/2 xl:w-7/12 p-6 sm:p-12">
            <div class="flex justify-center">
                <div class="w-full max-w-md">
                    <div class="text-green-900 font-semibold text-3xl text-center">
                        Hamro<span class="text-yellow-600">Sawari</span>
                    </div>
                    <div class="flex flex-col mt-4">
                        <h1 class="text-2xl xl:text-3xl font-extrabold text-center">Login</h1>
                        <div class="mt-8">
                            <div class="my-12 border-b text-center">
                                <h2 class="font-semibold text-gray-700">Please login to access features</h2>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mx-auto grid grid-cols-1 gap-4 p-4">
                                    <!-- Email Address -->
                                    <div>
                                        <input
                                            id="email"
                                            type="email"
                                            name="email"
                                            placeholder="Email"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus
                                            autocomplete="username"
                                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        />
                                        @error('email')
                                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <input
                                            id="password"
                                            type="password"
                                            name="password"
                                            placeholder="Enter Password"
                                            required
                                            autocomplete="current-password"
                                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        />
                                        @error('password')
                                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input
                                                id="remember_me"
                                                type="checkbox"
                                                name="remember"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            />
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    
                                    <!-- Login Button -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit" class="ml-3 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <span>{{ __('Login') }}</span>
                                        </button>
                                    </div>
                                    
                                    <!-- Forgot Password Link -->
                                    @if (Route::has('password.request'))
                                        <div class="flex justify-end mt-4">
                                            <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        </div>
                                    @endif
                                    
                                    <!-- Register Link -->
                                    <div class="text-center flex justify-center">
                                        <a href="{{ route('register') }}" class=" w-full  text-center text-gray-700 py-2 px-4 rounded-xl">
                                            Don't have an account? <span class="text-blue-600 text-semibold hover:text-blue-500">Register</span>
                                        </a>
                                    </div>
                                    
                                    <!-- Terms and Privacy Policy -->
                                    <p class="mt-6 text-xs text-gray-600 text-center">
                                        I agree to abide by Kisan Tools'
                                        <a href="#" class="border-b border-gray-500 border-dotted">Terms of Service</a>
                                        and its
                                        <a href="#" class="border-b border-gray-500 border-dotted">Privacy Policy</a>
                                    </p>
                                </div>
                                
                                <!-- Back to Home Link -->
                                <div class="flex items-center justify-end mt-4">
                                    <a href="{{ route('home') }}" class="ml-4 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Back Home
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
