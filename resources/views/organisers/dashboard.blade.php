@extends('layouts.app')

@section('content')
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
