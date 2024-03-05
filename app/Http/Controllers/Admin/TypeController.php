<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(5);
        $countTypes = Type::count();
        return view ('admin.types.index', compact('types','countTypes'));
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
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('types')],
        ]);
        $type = Type::create($validatedData);
        return redirect()->route('admin.type.index')->with('success','type created successfully.');
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
    public function edit(Type $type)
    {
        $countTypes = Type::count();
        return view('admin.types.edit', compact('type','countTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('types')],
        ]);
        $type->update($validatedData);
        return redirect()->route('admin.type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.type.index');
    }

    public function search(Request $request){
        $countTypes = Type::count();
        $keyword = $request->keyword;
        $types = Type::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        return view ('admin.types.index', compact('types','countTypes'));
    }
}
