@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Bus Management</h1>
<hr class="h-1 bg-red-500 mb-5">

<div class="mb-5 text-right">
    <a href="{{ route('addbus.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg">
        Add New Bus
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-5">
        {{ session('success') }}
    </div>
@endif

<table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-blue-900 text-white">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Image</th>
            <th class="px-4 py-2">Bus Number</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2">Route</th>
            <th class="px-4 py-2">Capacity</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Driver</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($buses as $bus)
        <tr class="text-center border-b">
            <td class="px-4 py-2">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">
                <img src="{{ asset('storage/images/' . $bus->image) }}" alt="Bus Image" class="h-16 w-24 object-cover rounded">
            </td>
            <td class="px-4 py-2">{{ $bus->bus_number }}</td>
            <td class="px-4 py-2">{{ $bus->category->name }}</td>
            <td class="px-4 py-2">{{ $bus->route->start_point }} - {{ $bus->route->end_point }}</td>
            <td class="px-4 py-2">{{ $bus->capacity }}</td>
            <td class="px-4 py-2">Rs. {{ number_format($bus->price, 2) }}</td>
            <td class="px-4 py-2">{{ $bus->driver_name }}</td>
            <td class="px-4 py-2">
                <span class="{{ $bus->status == 'active' ? 'text-green-600' : 'text-red-600' }}">
                    {{ ucfirst($bus->status) }}
                </span>
            </td>
            <td class="px-4 py-2 flex justify-center gap-2">
                <a href="{{ route('addbus.edit', $bus->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                    Edit
                </a>
                <form action="{{ route('addbus.destroy', $bus->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center text-red-500 p-5">No buses available.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-5">
    {{ $buses->links() }}
</div>
@endsection
