@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome, Admin!</h2>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary btn-lg btn-block">Manage Rooms</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.bookings') }}" class="btn btn-primary">Manage Bookings</a>

        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.room_categories.index') }}" class="btn btn-warning btn-lg btn-block">Add Room Category</a>
        </div>
    </div>
</div>
@endsection
