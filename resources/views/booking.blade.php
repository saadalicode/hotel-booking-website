<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - {{ $room->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Booking for: {{ $room->title }}</h2>
    <div class="card">
        <img src="{{ asset('storage/'.$room->image) }}" class="card-img-top" alt="{{ $room->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $room->title }}</h5>
            <p class="card-text">{{ $room->description }}</p>
            <p><strong>Price per night: </strong>${{ $room->price }}</p>
            {{-- <p><strong>Availability: </strong>{{ $room->availability ? 'Available' : 'Not Available' }}</p> --}}

            <!-- Booking Form -->
            <form action="{{ route('generateInvoice', ['room_id' => $room->id]) }}" method="GET">
                @csrf
                <div class="mb-3">
                    <label for="check_in" class="form-label">Check-in Date</label>
                    <input type="date" class="form-control" id="check_in" name="check_in" required>
                </div>
                <div class="mb-3">
                    <label for="check_out" class="form-label">Check-out Date</label>
                    <input type="date" class="form-control" id="check_out" name="check_out" required>
                </div>

                <button type="submit" class="btn btn-success">OK</button>

                <a href="{{ route('cancelBooking') }}" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>
</div>
</body>
</html>
