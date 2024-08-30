<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizersController extends Controller
{
    public function dashboard()
    {
        // Get the logged-in organizer
        $organizer = auth()->user();

        // Fetch the events created by this organizer
        $events = Event::where('organizer_id', $organizer->id)->get();

        // Pass the events to the dashboard view
        return view('organizers.dashboard', ['events' => $events]);
    }


    public function createEvent()
    {
        return view('organizers.create_event');
    }


    public function storeEvent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
            'status' => 'required|in:Upcoming,Ongoing,Completed',
            'visibility' => 'required|in:Public,Private',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date_time = $request->date_time;
        $event->category_id = $request->category_id;
        $event->organizer_id = auth()->user()->id;
        $event->max_attendees = $request->max_attendees;
        $event->ticket_price = $request->ticket_price;
        $event->status = $request->status;
        $event->visibility = $request->visibility;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event_images', 'public');
            $event->image = $imagePath;
        }

        $event->save();

        return redirect()->route('organizers.dashboard')->with('success', 'Event created successfully!');
    }


    public function editEvent($id)
    {
        // Fetch the event to edit
        $event = Event::findOrFail($id);

        // Fetch all categories for the select input
        $categories = Category::all();

        // Pass the event and categories to the view
        return view('organizers.edit_event', ['event' => $event, 'categories' => $categories]);
    }


    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
            'status' => 'required|in:Upcoming,Ongoing,Completed',
            'visibility' => 'required|in:Public,Private',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date_time = $request->date_time;
        $event->category_id = $request->category_id;
        $event->max_attendees = $request->max_attendees;
        $event->ticket_price = $request->ticket_price;
        $event->status = $request->status;
        $event->visibility = $request->visibility;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image) {
                Storage::delete('public/' . $event->image);
            }
            $imagePath = $request->file('image')->store('event_images', 'public');
            $event->image = $imagePath;
        }

        $event->save();

        return redirect()->route('organizers.dashboard')->with('success', 'Event updated successfully!');
    }


    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);

        // Delete event image if exists
        if ($event->image) {
            Storage::delete('public/' . $event->image);
        }

        $event->delete();

        return redirect()->route('organizers.dashboard')->with('success', 'Event deleted successfully!');
    }



}
