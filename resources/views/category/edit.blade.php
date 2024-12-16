@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('category.update', $category->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This is required for updating -->

    <!-- Category Name -->
    <input type="text" placeholder="Enter Category Name" name="name" class="w-full rounded-lg my-2" value="{{$category->name}}">
    @error('name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Types -->
    <input type="text" placeholder="Enter Types" name="types" class="w-full rounded-lg my-2" value="{{$category->types}}">
    @error('types')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Route Name -->
    <input type="text" placeholder="Enter Route Name" name="route_name" class="w-full rounded-lg my-2" value="{{$category->route_name}}">
    @error('route_name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Picture -->
    <input type="file" name="picture" class="w-full rounded-lg my-2">
    @error('picture')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Display Current Picture -->
    <p>Current Picture:</p>
    <img src="{{asset('images/categories/'.$category->picture)}}" alt="Category Picture" class="w-44">

    <!-- Submit and Cancel Buttons -->
    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Category</button>
        <a href="{{route('category.index')}}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection
