<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'eventName' => 'required|string|max:255',
            'eventDate' => 'required|date',
            'eventTime' => 'required',
            'durationHours' => 'required|integer',
            'durationMinutes' => 'required|integer',
            'eventType' => 'required|string',
            'numberOfPlaces' => 'required|string',
            'eventLocation' => 'required|string',
            'eventImage' => 'nullable|image|max:5120', // Maximum 5MB
            'eventDescription' => 'nullable|string',
        ]);

        // Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('eventImage')) {
            $imagePath = $request->file('eventImage')->store('event_images', 'public');
        }

        // Combine date and time to create a datetime object
        $startDateTime = $validatedData['eventDate'] . ' ' . $validatedData['eventTime'];

        // Create a new event
        Event::create([
            'name' => $validatedData['eventName'],
            'start_date_time' => $startDateTime,
            'duration_hours' => $validatedData['durationHours'],
            'duration_minutes' => $validatedData['durationMinutes'],
            'type' => $validatedData['eventType'],
            'capacity' => $validatedData['numberOfPlaces'],
            'location' => $validatedData['eventLocation'],
            'image_path' => $imagePath,
            'description' => $validatedData['eventDescription'],
        ]);

        // Return a response - can be redirect or JSON response
        return response()->json([
            'success' => true,
            'message' => 'Event created successfully!'
        ]);
    }
}
