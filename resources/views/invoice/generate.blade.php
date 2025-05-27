@extends('layouts.app')

@section('content')
<div class="container">
    <div class="invoice">
        <h3>Invoice</h3>
        <p><strong>Room No:</strong> {{ strtoupper(substr($room->category, 0, 1)) . $room->id }}</p>
        <p><strong>Room Title:</strong> {{ $room->title }}</p>
        <p><strong>Description:</strong> {{ $room->description }}</p>
        <p><strong>Price per Night:</strong> ${{ $room->price }}</p>
        <p><strong>Check-in Date:</strong> {{ $check_in ? $check_in->toFormattedDateString() : 'N/A' }}</p>
        <p><strong>Check-out Date:</strong> {{ $check_out ? $check_out->toFormattedDateString() : 'N/A' }}</p>
        <p><strong>Total Price:</strong> ${{ $total_price }}</p>

        <form action="{{ route('confirmBooking', ['room_id' => $room->id]) }}" method="POST" >
            @csrf
            <input type="hidden" name="check_in" value="{{ $check_in->toDateString() }}">
            <input type="hidden" name="check_out" value="{{ $check_out->toDateString() }}">
            <input type="hidden" name="total_price" value="{{ $total_price }}">

            <button type="submit" class="btn btn-success">Confirm Booking</button>
            <a href="{{ route('cancelBooking') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
@endsection
