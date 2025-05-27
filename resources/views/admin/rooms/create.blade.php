@extends('layouts.admin')

@section('content')
    <h1>Create Room</h1>
    <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Room Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" required>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
                <option value="penthouse">Penthouse</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Room Image</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <div class="form-group">
            <label for="total_rooms">Total Rooms</label>
            <input type="number" class="form-control" name="total_rooms" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Room</button>
    </form>
@endsection
