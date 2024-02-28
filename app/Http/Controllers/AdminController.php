<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'max_attendees' => 'required|numeric|min:1',
            'VIP_price' => 'required|numeric|min:0',
            'Regular_price' => 'required|numeric|min:0',
        ]);

        // Create the event
        Event::create($validatedData);

        // Redirect admin
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'max_attendees' => 'required|numeric|min:1',
            'VIP_price' => 'required|numeric|min:0',
            'Regular_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the event
        $event->update($validatedData);

        // Redirect admin
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        // Delete the event
        $event->delete();

        // Redirect admin
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}
