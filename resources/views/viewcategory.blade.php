@extends('layouts.master')

@section('content')
{{-- Therapist Profile Section --}}
<div class="container mx-auto mt-12 px-6 lg:px-16">
    <div class="grid lg:grid-cols-3 gap-8">
        {{-- Therapist Photo --}}
        <div class="col-span-1">
            <img src="{{ asset('images/categories/' . $category->picture) }}"
                alt="{{ $category->name }}"
                class="w-full h-64 md:h-80 lg:h-96  rounded-xl shadow-md hover:shadow-lg transition duration-300">
        </div>

        {{-- Therapist Information --}}
        <div class="col-span-2 bg-white rounded-xl shadow-lg p-8">
            {{-- Therapist Name --}}
            <h1 class="font-extrabold text-4xl text-gray-800 border-b pb-4">{{ $category->name }}</h1>

            {{-- About Section --}}
            <div class="mt-6 space-y-4">
                {{-- Description --}}
                <div>
                    <h2 class="font-semibold text-2xl text-gray-700">About Bus</h2>
                    <p class="text-gray-600 text-base mt-2 leading-relaxed">{{ $category->types }}</p>
                </div>

                {{-- Experience --}}
                <div>
                    <h2 class="font-semibold text-2xl text-gray-700">Route_name</h2>
                    <p class="text-gray-600 text-base mt-2 leading-relaxed">{{ $category->route_name }}</p>
                </div>
            </div>

            {{-- Appointment Button --}}
            <div class="text-center mt-6">
           <a href="" class="inline-block bg-sky-500 text-white font-bold py-3 no-underline px-6 rounded-lg shadow-md hover:bg-sky-600 hover:shadow-lg transition-all duration-300">Book Now
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
