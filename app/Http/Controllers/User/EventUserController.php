<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = User::find($request->user_id);
        $event = Event::find($request->event_id);

        if (!$event->automatic_acceptence) {
            $nbr_place = $request->input('number_place');
            $oldCapacity = $event->capacity;

            if ($oldCapacity >= $nbr_place) {
                $event = EventUser::create(array_merge($request->all(), ['status' => 0]));
                return redirect()->back()->with('success', 'Your reservation is confirmed! Please await further instructions from the organizer, and your ticket will be sent to you via email soon.');
            } else {
                return back()->with('error', 'The requested number of places exceeds the remaining capacity.');
            }
            
        } else {
            $nbr_place = $request->input('number_place');
            $oldCapacity = $event->capacity;
            if ($oldCapacity >= $nbr_place) {
                DB::beginTransaction();

                try {
                    $eventUser = EventUser::create($request->all());
                    $event->update(['capacity' => $oldCapacity -  $nbr_place]);
                    DB::commit();

                    return redirect()->route('user.reservation', $eventUser);
                } catch (\Exception $e) {
                    DB::rollback();
                    return back()->with('error', 'An error occurred. Please try again later.');
                }
            } else {
                return back()->with('error', 'The requested number of places exceeds the remaining capacity.');
            }
        }
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
