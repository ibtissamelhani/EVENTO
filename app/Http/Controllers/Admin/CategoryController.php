<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $countCat = Category::count();
        return view ('admin.categories.index', compact('categories','countCat'));
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
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')],
        ]);
        $category = Category::create($validatedData);
        return redirect()->route('admin.category.index')->with('success','Category created successfully.');
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
    public function edit(Category $category)
    {
        $countCat = Category::count();
        return view('admin.categories.edit', compact('category','countCat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')],
        ]);
        $category->update($validatedData);
        return redirect()->route('admin.category.index')->with('success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','Category deleted successfully.');
    }

    public function search(Request $request){
        $countCat = Category::count();
        $keyword = $request->keyword;
        $categories = Category::where('name', 'like', '%' . $keyword . '%')->paginate(10);
        return view ('admin.categories.index', compact('categories','countCat'));
    }
}
