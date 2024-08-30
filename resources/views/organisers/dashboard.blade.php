@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            padding: 20px;
        }

        h1 {
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            text-align: center;
            color: #e0e0e0;
            background-color: #ff6347;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            background-color: #e05040;
            box-shadow: 0 0 10px rgba(255, 99, 71, 1); /* Brighter glowing effect on hover */
        }

        .table {
            width: 100%;
            max-width: 1000px;
            border-collapse: collapse;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .table th, .table td {
            padding: 12px;
            border-bottom: 1px solid #555;
        }

        .table th {
            background-color: #444;
            color: #e0e0e0;
        }

        .table td {
            color: #e0e0e0;
        }

        .table tbody tr:hover {
            background-color: #444;
        }

        .btn-warning {
            background-color: #ffa500;
            color: #333;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-warning:hover {
            background-color: #e0a000;
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.7); /* Glowing effect on hover */
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333;
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.7); /* Glowing effect on hover */
        }
    </style>

    <div class="container">
        <h1>Your Events</h1>
        <a href="{{ route('organizers.events.create') }}" class="btn btn-primary">Create New Event</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Event Name</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date_time }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->status }}</td>
                    <td>
                        <a href="{{ route('organizers.events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('organizers.events.delete', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

