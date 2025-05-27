@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .room-category {
            margin-top: 30px;
        }
        .room-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .room-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .room-box h3 {
            margin-top: 15px;
        }
        .room-box p {
            color: #777;
        }
        .price, .availability {
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-book {
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

 @section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center mt-5">Choose Your Room</h1>
    <div class="row room-category">
        @foreach ($roomCategories as $room)
        <div class="col-md-3">
            <div class="room-box">
                <img src="{{ asset('storage/'.$room->image) }}" alt="{{ $room->title }}">
                <h3>{{ $room['title'] }}</h3>
                <p>{{ $room['description'] }}</p>
                <div class="price">${{ $room['price'] }} per night</div>
                <div class="availability">Available</div>
                <button class="btn-book">
                    @auth
                        <a href="{{ route('book', ['room_id' => $room['id']]) }}" class="text-white">Book Now</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white">Login to Book</a>
                    @endauth
                </button>
            </div>
        </div>
        @endforeach
    </div>

    @auth
        <h3>Your Bookings</h3>
        <ul>
            @foreach ($userBookings as $booking)
                <li>{{ $booking->room->title }} from {{ $booking->check_in }} to {{ $booking->check_out }}</li>
            @endforeach
        </ul>
    @endauth

</div>

@endsection

</body>
</html>
