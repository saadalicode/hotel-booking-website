<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .welcome-section {
            text-align: center;
            padding: 50px;
        }
        .btn-get-started {
            font-size: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="welcome-section">
    <h1>Welcome to Our Hotel</h1>
    <p>Experience luxury and comfort in our beautiful rooms.</p>
    <a href="{{ route('home') }}" class="btn-get-started">Get Started</a>
</div>

</body>
</html>
