@extends('layouts.app')

@section('content')

@foreach ($rooms as $room)
    <div class="room-container">
        <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->title }}">
        <h3>{{ $room->title }}</h3>
        <p>{{ $room->description }}</p>
        <p>Price: ${{ $room->price }}</p>
        <p>Availability: {{ $room->availability ? 'Available' : 'Not Available' }}</p>
        <a href="{{ route('book', ['room_id' => $room->id]) }}" class="text-white">Book Now</a>
    </div>
@endforeach

@endsection