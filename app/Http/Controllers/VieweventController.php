<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class VieweventController extends Controller
{
    /**
     * Display a listing of all events.
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('user.viewevents', compact('events'));
    }
}
