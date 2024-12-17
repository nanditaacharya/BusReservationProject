@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Create Bus Schedule</h1>
<hr class="h-1 bg-red-500 mb-5">

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-5">
        {{ session('success') }}
    </div>
@endif

<div class="mb-5 text-right">
    <a href="{{ route('schedule.index') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg">
        Back to Schedule List
    </a>
</div>

<form action="{{ route('schedule.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="mb-4">
        <label for="bus_id" class="block text-lg font-medium text-gray-700">Select Bus</label>
        <select name="bus_id" id="bus_id" class="w-full rounded-lg my-2 p-3 border @error('bus_id') border-red-500 @enderror">
            <option value="" disabled selected>Select a Bus</option>
            @foreach($buses as $bus)
                <option value="{{ $bus->id }}" {{ old('bus_id') == $bus->id ? 'selected' : '' }}>
                    {{ $bus->bus_number }} ({{ $bus->route->start_point }} - {{ $bus->route->end_point }})
                </option>
            @endforeach
        </select>
        @error('bus_id')
            <p class="text-red-500 -mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
    <label for="available_date" class="block text-lg font-medium text-gray-700">Available Date</label>
    <input 
        type="date" 
        name="available_date" 
        id="available_date" 
        value="{{ old('available_date') }}" 
        class="w-full rounded-lg my-2 p-3 border @error('available_date') border-red-500 @enderror"
        min=""
    >
    @error('available_date')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror
</div>

    <div class="mb-4">
        <label for="departure_time" class="block text-lg font-medium text-gray-700">Departure Time</label>
        <input type="time" name="departure_time" id="departure_time" value="{{ old('departure_time') }}" class="w-full rounded-lg my-2 p-3 border @error('departure_time') border-red-500 @enderror">
        @error('departure_time')
            <p class="text-red-500 -mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="status" class="block text-lg font-medium text-gray-700">Status</label>
        <select name="status" id="status" class="w-full rounded-lg my-2 p-3 border @error('status') border-red-500 @enderror">
            <option value="" disabled selected>Select Status</option>
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <p class="text-red-500 -mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex mt-4 justify-center gap-4">
        <input
            type="submit"
            value="Create Schedule"
            class="bg-green-600 text-white px-6 py-3 rounded-lg cursor-pointer"
        >

        <a
            href="{{ route('schedule.index') }}"
            class="bg-red-600 text-white px-6 py-3 rounded-lg"
        >Exit</a>
    </div>
</form>
<script>
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); 
    const day = String(today.getDate()).padStart(2, '0'); 
    
    document.getElementById('available_date').min = `${year}-${month}-${day}`;
</script>
@endsection
