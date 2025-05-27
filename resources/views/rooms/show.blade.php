@extends('layouts.app')

@section('content')
<div class="room-detail">
    <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->title }}">
    <h3>{{ $room->title }}</h3>
    <p>{{ $room->description }}</p>
    <p>Price: ${{ $room->price }}</p>
    <p>Availability: {{ $room->availability ? 'Available' : 'Not Available' }}</p>
    <form method="POST" action="{{ route('bookRoom', ['room_id' => $room->id]) }}">
        @csrf
        <label for="check_in">Check-in:</label>
        <input type="date" id="check_in" name="check_in" required>
        <label for="check_out">Check-out:</label>
        <input type="date" id="check_out" name="check_out" required>
        <button type="submit">Book Now</button>
    </form>
</div>
@endsection
