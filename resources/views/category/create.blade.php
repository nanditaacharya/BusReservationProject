@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Add Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('category.store')}}" method="POST" class="mt-5">
    @csrf

    <input
        type="text"
        name="name"
        placeholder="Enter Category Name"
        class="w-full rounded-lg my-2"
        value="{{old('name')}}">
    @error('name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <input
        type="number"
        name="priority_number"
        placeholder="Enter Priority Number"
        class="w-full rounded-lg my-2"
        value="{{old('priority_number')}}">
    @error('priority_number')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <div class="flex justify-center mt-5">
        <button
            type="submit"
            class="bg-blue-500 text-white px-5 py-2 rounded-lg">
            Save Category
        </button>
        <a
            href="{{route('category.index')}}"
            class="bg-red-500 text-white px-5 py-2 rounded-lg ml-2">
            Cancel
        </a>
    </div>
</form>
@endsection
