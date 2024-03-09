<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $eventUsers = EventUser::with('user')->where('status', 0)->whereHas('event', function($query) use($userId){
            $query->where('user_id',$userId);
        })->get();
        return view('organizer.reservations.index',compact('eventUsers'));
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
    public function update(EventUser $request)
    {
        $request->update(['status'=> 1]);
        return redirect()->route('user.email',$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventUser $request)
    {
        $request->delete();
        return redirect()->route('organizer.request.index');
    }
}
