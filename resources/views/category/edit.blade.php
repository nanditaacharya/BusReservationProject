@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('category.update', $category->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input
        type="number"
        name="priority_number"
        placeholder="Enter Priority Number"
        class="w-full rounded-lg my-2"
        value="{{ old('priority_number', $category->priority_number) }}">
    @error('priority_number')
    <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <input type="text" placeholder="Enter Category Name" name="name" class="w-full rounded-lg my-2" value="{{ old('name', $category->name) }}">
    @error('name')
    <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror





    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Category</button>
        <a href="{{ route('category.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection