<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'date_time' => 'required|date',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'max_attendees' => 'required|integer',
            'ticket_price' => 'required|numeric',
            'status' => 'required|in:Upcoming,Ongoing,Completed',
            'visibility' => 'required|in:Public,Private',
        ]);

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'date_time' => $request->date_time,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'organizer_id' => auth()->id(),
            'max_attendees' => $request->max_attendees,
            'ticket_price' => $request->ticket_price,
            'status' => $request->status,
            'visibility' => $request->visibility,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
}
