@extends('layouts.admin')

@section('content')
    <h1>Edit Room</h1>
    <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Room Title</label>
            <input type="text" class="form-control" name="title" value="{{ $room->title }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" required>
                <option value="single" {{ $room->category == 'single' ? 'selected' : '' }}>Single</option>
                <option value="double" {{ $room->category == 'double' ? 'selected' : '' }}>Double</option>
                <option value="suite" {{ $room->category == 'suite' ? 'selected' : '' }}>Suite</option>
                <option value="penthouse" {{ $room->category == 'penthouse' ? 'selected' : '' }}>Penthouse</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" value="{{ $room->price }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required>{{ $room->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Room Image</label>
            <input type="file" class="form-control" name="image">
            @if ($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="total_rooms">Total Rooms</label>
            <input type="number" class="form-control" name="total_rooms" value="{{ $room->total_rooms }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
@endsection
