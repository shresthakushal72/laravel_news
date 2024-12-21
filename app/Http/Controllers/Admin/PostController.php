<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.post.create', compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:3024",
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->meta_words = $request->meta_words;
        $post->meta_description = $request->meta_description;



        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time(). '.' . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $post->image = 'images/' . $fileName;
        }


        $post->save();
        toast('Record Added Successfully','success');
        return redirect()->back();

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
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:3024",
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->meta_words = $request->meta_words;
        $post->meta_description = $request->meta_description;



        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time(). '.' . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $post->image = 'images/' . $fileName;
        }


        $post->update();
        toast('Record Updated Successfully','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        toast('Record Deleted Successfully','success');
        return redirect()->back();
    }
}
