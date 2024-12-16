@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-extrabold text-blue-900">Categories</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{ route('category.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">Add Category</a>
</div>

<table class="w-full mt-5 border-collapse">
    <thead>
        <tr>
            <th class="border p-2 bg-gray-200">S.N</th>
            <th class="border p-2 bg-gray-200">Picture</th>
            <th class="border p-2 bg-gray-200">Name</th>
            <th class="border p-2 bg-gray-200">Type</th>
            <th class="border p-2 bg-gray-200">Route Name</th>
            <th class="border p-2 bg-gray-200">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td class="border p-2">{{ $loop->iteration }}</td>
            <td class="border p-2">
                @if($category->picture)
                    <img src="{{ asset('images/categories/'.$category->picture) }}" alt="Category Image" class="w-16 h-16">
                @else
                    <span class="text-gray-500">No Image</span>
                @endif
            </td>
            <td class="border p-2">{{ $category->name }}</td>
            <td class="border p-2">{{ $category->types }}</td>
            <td class="border p-2">
               {{$category->route_name}}
            </td>
            <td class="border p-2">
                <a href="{{ route('category.edit', $category->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure to Delete?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
