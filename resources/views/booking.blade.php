@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-4">Available Buses</h2>
        
        <form action="{{ route('booking') }}" method="GET" class="flex justify-center mb-6">
            <select name="route_id" class="w-full rounded-lg my-2 p-3 border" onchange="this.form.submit()">
                <option value="" selected>Please select your destination</option>
                @foreach($busroutes as $route)
                    <option value="{{ $route->id }}" {{ request('route_id') == $route->id ? 'selected' : '' }}>
                        {{ $route->start_point }} - {{ $route->end_point }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="travel_date" value="{{ request('travel_date') }}" class="w-full rounded-lg my-2 p-3 border ml-2" onchange="this.form.submit()">

            @error('route_id')
                <p class="text-red-500 -mt-2">{{ $message }}</p>
            @enderror
            @error('travel_date')
                <p class="text-red-500 -mt-2">{{ $message }}</p>
            @enderror
        </form>
    </div>

    @if(request('route_id') && request('travel_date') && $buses->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($buses as $bus)
        <div class="bg-white shadow-xl rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <img src="{{ $bus->image ? asset('storage/images/buses/'.$bus->image) : 'https://via.placeholder.com/300' }}" alt="Bus Image" class="w-full h-56 object-cover mb-4">

            <div class="p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Bus Number: <span class="text-blue-600">{{ $bus->bus_number }}</span></h3>

                <div class="text-gray-700 ">
                    <p><strong>Route:</strong> <span class="text-gray-600">{{ $bus->route->start_point }} - {{$bus->route->end_point}}</span></p>
                    <p><strong>Capacity:</strong> <span class="text-gray-600">{{ $bus->capacity }}</span></p>
                    <p><strong>Price:</strong> <span class="text-green-600 font-semibold">Rs {{ number_format($bus->price, 2) }}</span></p>
                </div>

                <div class="text-gray-700 mb-4">
                    <p><strong>Category:</strong> <span class="text-gray-600">{{ $bus->category->name }}</span></p>
                    <p><strong>Status:</strong> 
                        <span class="{{ $bus->status === 'active' ? 'text-green-600' : 'text-red-600' }} font-semibold">{{ ucfirst($bus->status) }}</span>
                    </p>
                </div>

                <div class="text-gray-700 mb-4">
                    <p><strong>Available Schedules:</strong></p>
                    @foreach($bus->schedules as $schedule)
                        @if($schedule->available_date === $travel_date)
                            <p>{{ $schedule->available_date }} | {{ $schedule->departure_time }}</p>
                        @endif
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="#" class="p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p class="text-center text-gray-500">Please select a route and date to view available buses.</p>
    @endif
</div>
@endsection
