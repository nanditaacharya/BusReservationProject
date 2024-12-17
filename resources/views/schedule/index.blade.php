@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Bus Schedule Management</h1>
<hr class="h-1 bg-red-500 mb-5">

<div class="mb-5 text-right">
    <a href="{{ route('schedule.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg">
        Create New Schedule
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-5">
        {{ session('success') }}
    </div>
@endif

<table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden mt-5">
    <thead>
        <tr class="bg-blue-900 text-white">
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
            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($schedule->dispatch_time)->format('H:i') }}</td>
            <td class="px-4 py-2 flex justify-center gap-2">
                <a href="{{ route('schedule.edit', $schedule->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                    Edit
                </a>
                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
            <td colspan="7" class="text-center text-red-500 p-5">No schedules available.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
