<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersCount = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->count();

        $organizersCount = User::whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->count();

        $totalEvents = Event::count();

        $publishedCount = Event::where('publish_event', 1)->count();
        $unpublishedCount = Event::where('publish_event', 0)->count();

        $automaticCount = Event::where('automatic_acceptence', 1)->count();
        $manualCount = Event::where('automatic_acceptence', 0)->count();

        $bannedCount = User::where('status', 2)->count();
        $allowedCount = User::where('status', 1)->count();

        return view('admin.dashboard', compact('usersCount','organizersCount','totalEvents',
        'unpublishedCount','publishedCount','manualCount','automaticCount', 'allowedCount','bannedCount'));
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
