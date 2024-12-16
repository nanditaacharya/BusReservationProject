@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900 text-center">Edit Bus Details</h1>
<hr class="h-1 bg-red-500 mb-5">

<form action="{{ route('addbus.update', $bus->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input
        type="text"
        name="bus_number"
        placeholder="Enter Bus Number"
        value="{{ old('bus_number', $bus->bus_number) }}"
        class="w-full rounded-lg my-2 p-3 border"
    >
    @error('bus_number')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

 
    <select name="category_id" class="w-full rounded-lg my-2 p-3 border">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $bus->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror
 
    <select name="route_id" class="w-full rounded-lg my-2 p-3 border">
        <option value="" disabled>Select Route</option>
        @foreach($routes as $route)
            <option value="{{ $route->id }}" {{ old('route_id', $bus->route_id) == $route->id ? 'selected' : '' }}>
                {{ $route->start_point }} - {{ $route->end_point }}
            </option>
        @endforeach
    </select>
    @error('route_id')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="number"
        name="capacity"
        placeholder="Enter Capacity"
        value="{{ old('capacity', $bus->capacity) }}"
        class="w-full rounded-lg my-2 p-3 border"
    >
    @error('capacity')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="number"
        name="price"
        step="0.01"
        placeholder="Enter Price"
        value="{{ old('price', $bus->price) }}"
        class="w-full rounded-lg my-2 p-3 border"
    >
    @error('price')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="text"
        name="driver_name"
        placeholder="Enter Driver Name"
        value="{{ old('driver_name', $bus->driver_name) }}"
        class="w-full rounded-lg my-2 p-3 border"
    >
    @error('driver_name')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input
        type="text"
        name="driver_license"
        placeholder="Enter Driver License Number"
        value="{{ old('driver_license', $bus->driver_license) }}"
        class="w-full rounded-lg my-2 p-3 border"
    >
    @error('driver_license')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <div class="my-4">
        <label for="image" class="block font-bold">Upload New Image (optional):</label>
        <input type="file" name="image" id="image" class="w-full border p-2 rounded-lg">
        <p class="mt-2 text-sm text-gray-600">Current Image:</p>
        <img src="{{ asset('storage/images/' . $bus->image) }}" alt="Current Bus Image" class="h-24 w-40 object-cover rounded">
    </div>
    @error('image')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <select name="status" class="w-full rounded-lg my-2 p-3 border">
        <option value="" disabled>Select Status</option>
        <option value="active" {{ old('status', $bus->status) == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $bus->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <div class="flex justify-center gap-4 mt-5">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg">
            Update
        </button>
        <a href="{{ route('addbus.index') }}" class="bg-red-600 text-white px-6 py-2 rounded-lg">
            Cancel
        </a>
    </div>
</form>
@endsection
