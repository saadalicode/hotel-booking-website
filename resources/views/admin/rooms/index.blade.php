@extends('layouts.admin')

@section('content')
    <h1>Rooms</h1>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">Add New Room</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->title }}</td>
                    <td>{{ $room->category }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" style="display:inline;">
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
