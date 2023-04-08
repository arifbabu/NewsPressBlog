<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use File;
use Alert;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::with('tags')->with('categories')->latest()->paginate(8);
        return view('website.post.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('website.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        // return "ok";

        $dom = new \DomDocument();
        $dom->loadHtml($validated['description'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'));
        }
 
        foreach($image_file as $key => $image) {
            $data = $image->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $img_data = base64_decode($data);
            $image_name = "/uploads/" . time().$key.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $img_data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
 
        $validated['description'] = $dom->saveHTML();

        $post = Post::create($validated);
        $post->tags()->sync($request->tags, true);
        $post->categories()->sync($request->categories, true);
        // Alert::success('Success', 'Post Created successfully!');     
        return back();

        return redirect()
            ->route('article.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, $id)
    {
        // $post = Post::find($id);
        // $post = Post::find($id)->with('tags')->get();


        // $post = Post::with('tags')->with('categories')->find($id);
        $post = Post::with('tags')->with('categories')->with('comments')->find($id);
        return view('website.post.singlePost', compact('post'));
        
        return $id;
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::find($id);
        if($post){
            $post->delete();
            return back();
        }
    }

    // Not Use Right Now
    public function resotePost($id){
        $post = Post::withTrashed()->find($id)->restore();
        // Alert::warning('Resoted Data!', 'Congratulations buddy! You saved me!!');
        return back();
    }

    public function pDeletePost($id){
        // $post = Post::find($id);
        // $post = Post::with('tags')->with('categories')->find($id)->forceDelete();
        // return $post;
        $post = Post::onlyTrashed()->find($id)->forceDelete();
        Alert::warning('Permanent Deleted!', 'Your File no longer available!');
        return back();
    }

    // Not Use Right Now


    public function trashFolder()
    {
        $trash = Post::onlyTrashed()->latest()->get();
        return view('website.post.posttrashFolder', compact('trash'));
    }

public function changeStatus(Request $request)
    {
        $user = Post::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }


}
