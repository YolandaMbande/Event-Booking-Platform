@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Event</h1>
        <form action="{{ route('organizers.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_time">Date & Time</label>
                <input type="datetime-local" name="date_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    <!-- Assuming you have a Category model -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="max_attendees">Maximum Attendees</label>
                <input type="number" name="max_attendees" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ticket_price">Ticket Price</label>
                <input type="number" name="ticket_price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="visibility">Visibility</label>
                <select name="visibility" class="form-control" required>
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create Event</button>
        </form>
    </div>
@endsection
