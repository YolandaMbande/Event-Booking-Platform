<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking Platform</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #e0e0e0;
            padding: 10px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        header nav {
            margin-top: 10px;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: #e0e0e0;
            text-decoration: none;
            font-weight: bold;
        }

        header nav ul li a:hover {
            color: #ff6347;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            padding: 20px;
        }

        form {
            background-color: #333;
            border-radius: 8px;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            position: relative; /* Ensure form is not affecting z-index */
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #e0e0e0;
        }

        form input, form select {
            width: 90%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: #444;
            color: #e0e0e0;
        }

        form button {
            background-color: #ff6347;
            color: #e0e0e0;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #e05040;
        }

        footer {
            background-color: #333;
            color: #e0e0e0;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <h1>Welcome to the Event Booking Platform</h1>
    <nav>
        <ul>
            <li><a href="{{ route('events.index') }}">Browse Events</a></li>
            <li><a href="{{ route('organisers.create_event') }}">Create Event</a></li>
        </ul>
    </nav>
</header>

<main>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="organizer">Organizer</option>
            </select>
        </div>
        <button type="submit">Register</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 Event Booking Platform</p>
</footer>
</body>
</html>
