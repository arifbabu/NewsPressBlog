<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Alert;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::select('id', 'name')->get();
        return view('website.tag.show', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return back();
        Alert::success('Success', 'Tag Created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Tag $tag, $id)
    {
        $tag = Tag::find($id);
        return view('website.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag, $id)
    {
        $tag = Tag::find($id);
        $request->validate([
            'name' => 'required|max:100',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->update();
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag, $id)
    {
        $tag = Tag::find($id);
        if($tag){
            $tag->delete();
            Alert::warning('Soft Delete!', 'Your File Stored into Trash Folder!');
            return back();
        }
    }
// Not Use Right Now
    public function resoteTag($id){
        $tag = Tag::withTrashed()->find($id)->restore();
        Alert::warning('Restored!', 'Your File Stored into Trash Folder!');
        return back();
    }

    public function pDeleteTag($id){
        $tag = Tag::onlyTrashed()->find($id)->forceDelete();
        Alert::warning('Force Delete!', 'Your File is no longer available!');
        return back();
    }

    // Not Use Right Now


    public function trashFolder()
    {
        $trash = Tag::onlyTrashed()->latest()->get();
        return view('website.tag.tagtrashFolder', compact('trash'));
    }

}
