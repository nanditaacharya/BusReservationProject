@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Bus Management</h1>
<hr class="h-1 bg-red-500 mb-5">

<div class="mb-5 text-right">
    <a href="{{ route('addbus.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">
        Add New Bus
    </a>
</div>

@if(session('success'))
<div
    id="toast-success"
    class="fixed top-5 right-5 bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 z-50 transform transition-all duration-500 animate-fade-in">
    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
    <span class="font-semibold text-lg">{{ session('success') }}</span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if (toast) {
                toast.classList.add('opacity-0', '-translate-y-5');
                setTimeout(() => toast.remove(), 1000);
            }
        }, 500);
    });
</script>
@endif


<table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-gray-200 text-gray-800">
            <th class="px-4 py-2">S.N</th>
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
                <img src="{{ asset('/images/buses/' . $bus->image) }}" alt="Bus Image" class="h-16 w-24 object-cover rounded">
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
                <a href="{{ route('addbus.edit', $bus->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">
                    Edit
                </a>
                <form action="{{ route('addbus.destroy', $bus->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded cursor-pointer">
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