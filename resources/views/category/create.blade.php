@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Add Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('category.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf

    <!-- Category Name -->
    <input
        type="text"
        name="name"
        placeholder="Enter Category Name"
        class="w-full rounded-lg my-2"
        value="{{old('name')}}">
    @error('name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Picture -->
    <input
        type="file"
        name="picture"
        class="w-full rounded-lg my-2">
    @error('picture')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Types -->
    <input
        type="text"
        name="types"
        placeholder="Enter Types"
        class="w-full rounded-lg my-2"
        value="{{old('types')}}">
    @error('types')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Route Name -->
    <input
        type="text"
        name="route_name"
        placeholder="Enter Route Name"
        class="w-full rounded-lg my-2"
        value="{{old('route_name')}}">
    @error('route_name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <div class="flex justify-center mt-5">
        <!-- Submit Button -->
        <button
            type="submit"
            class="bg-blue-500 text-white px-5 py-2 rounded-lg">
            Save Category
        </button>
        <!-- Cancel Button -->
        <a
            href="{{route('category.index')}}"
            class="bg-red-500 text-white px-5 py-2 rounded-lg ml-2">
            Cancel
        </a>
    </div>
</form>
@endsection
