@extends('layouts.master')
@section('content')

<div class="relative bg-gradient-to-b from-black to-gray-900 min-h-[75vh]">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/random/wallpaper.jpg') }}" 
             alt="Bus Background" 
             class="w-full h-full object-cover opacity-50">
    </div>
    <div class="absolute inset-0 bg-black opacity-60 z-0"></div>

    <div class="relative z-10 flex flex-col justify-center items-center text-white text-center h-[75vh]">
        <h1 class="text-6xl font-extrabold drop-shadow-2xl mb-6">Discover Your Next Bus Journey</h1>
        <p class="text-lg md:text-2xl max-w-4xl px-4 md:px-0 mb-8">
            Book premium buses for your trips at affordable prices. Comfort, safety, and convenience guaranteed.
        </p>
        <a href="#details" class="bg-sky-600 hover:bg-sky-700 px-8 py-3 text-lg font-bold rounded-md shadow-lg transition duration-300">
            Book Now
        </a>
    </div>
</div>

<div class="bg-white py-16 px-6 md:px-16">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Why Choose Us?</h2>
        <p class="text-gray-600 text-lg">
            Experience the best in bus booking with safety, convenience, and time-saving services.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="flex flex-col items-center bg-gray-100 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="w-16 h-16 mb-4">
                <img src="{{ asset('images/random/safetravel.png') }}" 
                     alt="Safe Journey" 
                     class="w-full h-full object-contain">
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Safe Journey</h3>
            <p class="text-gray-600 text-center">
                Travel with peace of mind knowing our buses prioritize safety and comfort.
            </p>
        </div>

        <div class="flex flex-col items-center bg-gray-100 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="w-16 h-16 mb-4">
                <img src="{{ asset('images/random/timesaving.png') }}" 
                     alt="Time-Saving" 
                     class="w-full h-full object-contain">
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Time-Saving</h3>
            <p class="text-gray-600 text-center">
                Save time with our easy-to-use booking platform and fast booking process.
            </p>
        </div>

        <div class="flex flex-col items-center bg-gray-100 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="w-16 h-16 mb-4">
                <img src="{{ asset('images/random/easybooking.png') }}" 
                     alt="Easy Booking" 
                     class="w-full h-full object-contain">
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Easy Booking</h3>
            <p class="text-gray-600 text-center">
                Book your bus seats effortlessly with a smooth and intuitive process.
            </p>
        </div>

    </div>
</div>


<!-- Call-to-Action Section
<div class="bg-sky-700 text-white py-16 text-center">
    <h2 class="text-4xl font-extrabold mb-6">Ready to Book Your Seat?</h2>
    <p class="text-lg max-w-3xl mx-auto mb-8">
        Don’t miss out on comfortable and safe travel. Book your tickets now and enjoy hassle-free journeys.
    </p>
    <a href="" 
       class="bg-white text-sky-700 px-8 py-3 text-lg font-bold rounded-md shadow-lg hover:bg-gray-200 transition duration-300">
        Get Started
    </a>
</div> -->

@endsection
