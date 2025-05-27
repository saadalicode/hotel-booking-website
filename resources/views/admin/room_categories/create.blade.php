@extends('layouts.admin')

@section('content')
    <h1>Create Room Category</h1>
    <form action="{{ route('admin.room_categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <div class="form-group">
            <label for="total_rooms">Total Rooms</label>
            <input type="number" class="form-control" name="total_rooms" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
@endsection
