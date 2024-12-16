@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Bus Route</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('bus-route.update', $busRoute->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input
        type="text"
        placeholder="Enter Priority"
        name="priority"
        class="w-full rounded-lg my-2"
        value="{{ old('priority', $busRoute->priority) }}"
    >
    @error('priority')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

 
    @error('name')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="text"
        placeholder="Enter Start Point"
        name="start_point"
        class="w-full rounded-lg my-2"
        value="{{ old('start_point', $busRoute->start_point) }}"
    >
    @error('start_point')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="text"
        placeholder="Enter End Point"
        name="end_point"
        class="w-full rounded-lg my-2"
        value="{{ old('end_point', $busRoute->end_point) }}"
    >
    @error('end_point')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="number"
        step="0.1"
        placeholder="Enter Distance (km)"
        name="distance"
        class="w-full rounded-lg my-2"
        value="{{ old('distance', $busRoute->distance) }}"
    >
    @error('distance')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="text"
        placeholder="Enter Duration (e.g., 1 hour 30 mins)"
        name="duration"
        class="w-full rounded-lg my-2"
        value="{{ old('duration', $busRoute->duration) }}"
    >
    @error('duration')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

  
    <div class="flex mt-4 justify-center gap-4">
        <input
            type="submit"
            value="Update Bus Route"
            class="bg-blue-600 text-white px-5 py-3 rounded-lg cursor-pointer"
        >

        <a
            href="{{ route('bus-route.index') }}"
            class="bg-red-600 text-white px-10 py-3 rounded-lg"
        >Exit</a>
    </div>
</form>

@endsection
