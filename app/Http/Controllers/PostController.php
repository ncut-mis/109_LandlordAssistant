<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function owners_index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $data = ['posts' => $posts];
        return view('owners.locations.posts.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('owners.locations.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location, Post $post)

    {
        return view('owners.locations.posts.edit', compact('location', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Location $location, Post $post,Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('owners.locations.posts.index', $location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
