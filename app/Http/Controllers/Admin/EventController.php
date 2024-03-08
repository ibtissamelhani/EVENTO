<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingEvents = Event::where('publish_event','=', '0')->latest()->paginate(6);
        $events = Event::paginate(8);
        return view('admin.events.index', compact('pendingEvents','events'));
    }



    public function publishEvent(Event $event)
    {
        $event->update(['publish_event'=> 1]);
        return redirect()->route('admin.event.index');
    }
    public function unpublishEvent(Event $event)
    {
        $event->update(['publish_event'=> 0]);
        return redirect()->route('admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index')
            ->with('success', 'Event deleted successfully.');
    }
}
