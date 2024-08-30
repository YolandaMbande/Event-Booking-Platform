<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #333;
        }

        .navbar a {
            color: #e0e0e0;
            text-decoration: none;
            padding: 10px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #ff6347;
        }

        .event-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .event-box {
            position: relative;
            width: 250px;
            height: 250px;
            background-color: #333;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .event-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s;
        }

        .event-description {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: #e0e0e0;
            padding: 10px;
            text-align: center;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .event-box:hover .event-description {
            transform: translateY(0);
        }
    </style>
</head>
<body class="antialiased">
<div class="navbar">
    <a href="{{ url('/home') }}">Home</a>
    <div>
        <a href="{{ route('login') }}">Log in</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    </div>
</div>


<div class="event-container">
    <!-- Example Event Box -->
    <div class="event-box">
        <img src="{{ asset('images/event.jpeg') }}" alt="Event Image">
        <div class="event-description">
            <p>Location: Event Location</p>
            <p>Time: Event Time</p>
        </div>
    </div>
    <div class="event-box">
        <img src="{{ asset('images/event.jpeg') }}" alt="Event Image">
        <div class="event-description">
            <p>Location: Event Location</p>
            <p>Time: Event Time</p>
        </div>
    </div>
    <div class="event-box">
        <img src="{{ asset('images/event.jpeg') }}" alt="Event Image">
        <div class="event-description">
            <p>Location: Event Location</p>
            <p>Time: Event Time</p>
        </div>
    </div>
    <div class="event-box">
        <img src="{{ asset('images/event.jpeg') }}" alt="Event Image">
        <div class="event-description">
            <p>Location: Event Location</p>
            <p>Time: Event Time</p>
        </div>
    </div>

    <!-- Add more event boxes as needed -->
</div>
</body>
</html>

