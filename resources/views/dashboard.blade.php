@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-extrabold text-blue-900 mb-6"><i class="ri-dashboard-horizontal-fill"></i>Dashboard</h1>
    <hr class="h-1 bg-red-500 mb-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Bookings Overview -->
        <div class="bg-red-100 p-5 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900 mb-3"><i class="ri-check-double-line"></i>Bookings</h2>
            <p>Total bookings: <span class="font-semibold">100</span></p>
        </div>

        <!-- Users Overview -->
        <div class="bg-green-100 p-5 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900 mb-3"><i class="ri-file-user-fill"></i>Users</h2>
            <p>Total Users: <span class="font-semibold">15</span></p>
        </div>

        <!-- Pending Requests -->
        <div class="bg-yellow-100 p-5 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900 mb-3"><i class="ri-timer-2-fill"></i>Pending Requests</h2>
            <p>Pending requests: <span class="font-semibold">20</span></p>
        </div>

        <!-- Processing Requests -->
        <div class="bg-purple-100 p-5 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900 mb-3"><i class="ri-loader-2-line"></i>Processing Requests</h2>
            <p>Processing requests: <span class="font-semibold">30</span></p>
        </div>

        <!-- Booked Overview -->
        <div class="bg-pink-100 p-5 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900 mb-3"><i class="ri-contract-fill"></i>Booked</h2>
            <p>Total Booked: <span class="font-semibold">40</span></p>
        </div>
    </div>
@endsection
