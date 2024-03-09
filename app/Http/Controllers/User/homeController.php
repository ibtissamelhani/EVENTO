<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $events = Event::where('publish_event',1)->where('date', '>', now())->paginate(6);
        return view('user.welcome',compact('events','categories'));
    }


}
