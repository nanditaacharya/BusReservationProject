
@extends('layouts.master')
@section('content')

<div class="px-6 sm:px-12 py-10 bg-gradient-to-b from-sky-100 to-lavender-50 min-h-screen">
    <!-- Hero Section -->
    @if(Route::currentRouteName() == 'home')
    <div class="relative w-full h-[600px]">
        <img src="{{ asset('images\categories\joomla welcome.jpg') }}" alt="Bus Categories" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center">
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h1 class="text-4xl font-bold mb-4">Explore Our Bus Categories</h1>
            <p class="mb-6">Find the best buses for your next journey</p>
            <a href="#categories" class="bg-sky-600 text-white px-6 py-3 rounded-md no-underline hover:bg-sky-400">
                View Categories
            </a>
        </div>
    </div>
    @endif

    <br><br><br>
    <div class="px-16" id="categories">
        <!-- Bus Categories Section -->
        <div class="text-center mb-6">
            <h2 class="text-4xl font-bold text-sky-800">Available Bus Categories</h2>
            <p class="text-gray-700">Choose a category that fits your travel needs.</p>
        </div>
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-center">
            @foreach($categories as $category)
            <a href="{{ route('viewcategory', $category->id) }}" class="group">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300">
                    <!-- Bus Image -->
                    <img src="{{ asset('images/categories/' . $category->picture) }}"
                         alt="{{ $category->name }}"
                         class="w-24 h-24 mx-auto mb-4 rounded-full object-cover group-hover:scale-110 transform transition duration-300">

                    <!-- Bus Name -->
                    <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-700 transition duration-300">
                        {{ $category->name }}
                    </h3>

                    <!-- Bus Description -->
                    <p class="text-gray-600 text-sm mt-2 line-clamp-3 overflow-hidden">
                        {{ Str::limit($category->types, 80, '...') }}
                    </p>

                    <!-- Button -->
                    <button class="mt-4 bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                        View Details
                    </button>

                    <!-- Hover Effect -->
                    <div class="absolute inset-0 bg-blue-100 opacity-0 group-hover:opacity-30 rounded-lg transition duration-300"></div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection




