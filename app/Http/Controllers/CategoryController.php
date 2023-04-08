<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::select('id', 'name')->get();
        return view('website.category.show', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);
        $cat = new Category();
        // $cat->name = $request->name;
        $cat->name = strtolower($request->name);
        $cat->save();
        return back();
        Alert::success('Success', 'Category Created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Category $cat, $id)
    {
        $cat = Category::find($id);
        return view('website.category.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $cat, $id)
    {
        $cat = Category::find($id);
        $request->validate([
            'name' => 'required|max:100',
        ]);
        $cat = Category::find($id);
        $cat->name = strtolower($request->name);
        $cat->update();
        return redirect()->route('cat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $cat, $id)
    {
        $cat = Category::find($id);
        if($cat){
            $cat->delete();
            Alert::warning('Soft Delete!', 'Your File Stored into Trash Folder!');
            return back();
        }
    }
// Not Use Right Now
    public function resoteCategory($id){
        $cat = Category::withTrashed()->find($id)->restore();
        Alert::warning('Soft Delete!', 'Your File Stored into Trash Folder!');
        return back();
    }

    public function pDeleteCategory($id){
        $cat = Category::find($id)->forceDelete();
        Alert::warning('Permanent Deleted!', 'Your File no longer available!');
        return back();
    }

    // Not Use Right Now


    public function trashFolder()
    {
        $trash = Category::onlyTrashed()->latest()->get();
        return view('website.category.categorytrashFolder', compact('trash'));
    }
}



