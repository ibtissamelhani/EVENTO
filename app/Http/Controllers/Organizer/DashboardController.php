<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $eventsCount = Event::where('user_id', $userId)->count();

        $eventUserCount = EventUser::where('status', 0)->whereHas('event', function($query) use($userId){
            $query->where('user_id',$userId);
        })->count();

        $publishedCount = Event::where('user_id', $userId)->where('publish_event', 1)->count();
        $unpublishedCount = Event::where('user_id', $userId)->where('publish_event', 0)->count();

        $automaticCount = Event::where('user_id', $userId)->where('automatic_acceptence', 1)->count();
        $manualCount = Event::where('user_id', $userId)->where('automatic_acceptence', 0)->count();
        return view('organizer.dashboard' , compact('eventsCount','publishedCount','unpublishedCount','manualCount','automaticCount','eventUserCount'));
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
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
