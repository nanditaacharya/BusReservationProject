@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Bus Schedule Management</h1>
<hr class="h-1 bg-red-500 mb-5">

<div class="mb-5 text-right">
    <a href="{{ route('schedule.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">
        Create New Schedule
    </a>
</div>

@if(session('success'))
    <div 
        id="toast-success" 
        class="fixed top-5 right-5 bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 z-50 transform transition-all duration-500 animate-fade-in"
    >
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

<table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden mt-5">
    <thead>
        <tr class="bg-gray-200 text-gray-800">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Bus Number</th>
            <th class="px-4 py-2">Route</th>
            <th class="px-4 py-2">Available Date</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Dispatch Time</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($schedules as $schedule)
        <tr class="text-center border-b">
            <td class="px-4 py-2">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">{{ $schedule->bus->bus_number }}</td>
            <td class="px-4 py-2">{{ $schedule->bus->route->start_point }} - {{ $schedule->bus->route->end_point }}</td>
            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($schedule->available_date)->format('d-m-Y') }}</td>
            <td class="px-4 py-2">
                <span class="text-white px-3 py-1 rounded-lg {{ $schedule->status == 'active' ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ ucfirst($schedule->status) }}
                </span>
            </td>
            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($schedule->departure_time)->format('H:i') }}</td>

            <td class="px-4 py-2 flex justify-center gap-2">
                <a href="{{ route('schedule.edit', $schedule->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">
                    Edit
                </a>
                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
            <td colspan="7" class="text-center text-red-500 p-5">No schedules available.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
