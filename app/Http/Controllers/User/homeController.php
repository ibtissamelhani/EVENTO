<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\searchRequest;
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


    public function search(Request $request){
        $query = Event::with('category');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $events = $query->where('date', '>', now())->paginate(6);

        $categories = Category::orderBy('name')->get();
        return view('user.welcome',compact('events','categories'));
    }


}
