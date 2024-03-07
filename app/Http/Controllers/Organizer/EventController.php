<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgEvents = Auth::user()->organizerEvents()->get();
        return view('organizer.events.index', compact('orgEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('organizer.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        
        $event = Event::create($request->all());

        $event->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('organizer.event.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('organizer.events.edit', compact('event','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());
        if ($request->hasFile('image')) {
            $event->clearMediaCollection('images');
            $event->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('organizer.event.index')->with('success', 'Event udated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('organizer.event.index')
            ->with('success', 'Event deleted successfully.');
    }
}
