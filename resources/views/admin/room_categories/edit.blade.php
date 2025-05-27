@extends('layouts.admin')

@section('content')
    <h1>Edit Room Category</h1>
    <form action="{{ route('admin.room_categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required>{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" class="form-control" name="image">
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="total_rooms">Total Rooms</label>
            <input type="number" class="form-control" name="total_rooms" value="{{ $category->total_rooms }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" value="{{ $category->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
