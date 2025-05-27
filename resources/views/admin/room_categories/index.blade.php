@extends('layouts.admin')

@section('content')
    <h1>Room Categories</h1>
    <a href="{{ route('admin.room_categories.create') }}" class="btn btn-primary">Add New Category</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Total Rooms</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->total_rooms }}</td>
                    <td>{{ $category->price }}</td>
                    <td>
                        <a href="{{ route('admin.room_categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.room_categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
