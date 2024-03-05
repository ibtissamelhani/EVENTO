<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(6);
        $countUsers = User::count();
        return view('admin.users.index', compact('users','countUsers'));
    }

// block a user
    public function blockUser(User $user)
    {
        $user->update(['status'=> 2]);
        return redirect()->route('admin.user.index');
    }

// unblock a user
    public function unblock(User $user){

        if($user->status == 2){
            $user->update(['status'=> 1]);
        
        }
        return redirect()->route('admin.user.index');
    }


    public function search(Request $request){
        $countUsers = User::count();
        $keyword = $request->keyword;
        $users = User::where('name', 'like', '%' . $keyword . '%')
                        ->orwhere ('email', 'like', '%' . $keyword . '%')
                        ->paginate(6);
        return view ('admin.users.index', compact('users','countUsers'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     // 
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $countUsers = User::count();
        $STATUS_RADIO = User::STATUS_RADIO;
        $roles = Role::whereNotIn('name', ['Organizer'])->get();
        return view('admin.users.edit', compact('user','countUsers','STATUS_RADIO','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
