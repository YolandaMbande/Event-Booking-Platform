<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking Platform</title>
    <!-- Add your CSS links here -->
</head>
<body>
<header>
    <h1>Welcome to the Event Booking Platform</h1>
    <nav>
        <ul>
            <li><a href="{{ route('events.index') }}">Browse Events</a></li>
            <li><a href="{{ route('organisers.create_event') }}">Create Event</a></li>
            <!-- Add other navigation links as needed -->
        </ul>
    </nav>
</header>

<main>
    <h2>Dashboard</h2>
    <!-- Add more content here, e.g., featured events or user-specific info -->

    <!-- Example registration form -->
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

