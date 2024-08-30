@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('organizers.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" name="name" class="form-control" value="{{ $event->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" class="form-control" required>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
            </div>
            <div class="form-group">
                <label for="date_time">Date & Time</label>
                <input type="datetime-local" name="date_time" class="form-control" value="{{ \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $event->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="max_attendees">Maximum Attendees</label>
                <input type="number" name="max_attendees" class="form-control" value="{{ $event->max_attendees }}" required>
            </div>
            <div class="form-group">
                <label for="ticket_price">Ticket Price</label>
                <input type="number" name="ticket_price" class="form-control" step="0.01" value="{{ $event->ticket_price }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Upcoming" {{ $event->status == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="Ongoing" {{ $event->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ $event->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="visibility">Visibility</label>
                <select name="visibility" class="form-control" required>
                    <option value="Public" {{ $event->visibility == 'Public' ? 'selected' : '' }}>Public</option>
                    <option value="Private" {{ $event->visibility == 'Private' ? 'selected' : '' }}>Private</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload New Image (Optional)</label>
                <input type="file" name="image" class="form-control">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" width="150">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update Event</button>
        </form>
    </div>
@endsection
