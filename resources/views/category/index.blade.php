@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-extrabold text-blue-900 mb-4">Categories</h1>
<hr class="h-1 bg-red-500 mb-5">
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


<div class="text-right my-5">
    <a href="{{ route('category.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition">Add Category</a>
</div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="w-full mx-auto mt-5 border-collapse">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-4 text-left">S.N</th>
                <th class="border p-4 text-left">Name</th>
                <th class="border p-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="border-b">
                <td class="border p-4">{{ $loop->iteration }}</td>
                <td class="border p-4">{{ $category->name }}</td>
                <td class="border p-4 text-center">
                    <a href="{{ route('category.edit', $category->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-500 transition">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure to Delete?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500 transition">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
