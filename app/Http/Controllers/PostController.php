<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Post;
use App\Models\House;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(House $house)
    {
        $locations = Location::whereHas('houses', function ($q) {
            $q->where('id', '=', 2);
        })->with('posts')->get();
        $houses = House::find($house);
        $view_data = [
            'locations' => $locations,
            'houses'=> $houses,
        ];
        return view('renters.houses.posts.index',$view_data);
    }

    public function owners_index($location_id)
    {

        $location = Location::with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc'); // 按照创建时间降序排列帖子
        }])->findOrFail($location_id);
        return view('owners.locations.posts.index', [
            'locations' => collect([$location]),
            'location' => $location
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//       dd($location) ;
        $location = Location::with('posts')->get();
        $location_data=['location'=>$location];
        return view('owners.locations.posts.create', $location_data );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Location $location, Request $request )
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'content' => 'required',

        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'date' => $request->input('date'),
        ]);
//        真實用戶
//        $post->user_id = auth()->user()->id;
        $post->owner_id = 1;
        $location->posts()->save($post);

//        $request->merge(['location_id' => $location->id]);
//        Post::create($request->all());
        //dump &die
        //dd($request->all());

        return redirect()->route('owners.locations.posts.index',$location);
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house,Post $post)
    {
        $num=$post->id;
        $house=House::find($house);
        $posts = Post::find ($num);
        $view_data = [
            'posts'=>$posts,
            'houses'=>$house,
        ];
        return view('renters.houses.posts.show',$view_data);
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
        //
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
    public function destroy(Location $location, Post $post)
    {
        //dd($post->id);
        $post = Post::findOrFail($post->id);
        $post->delete();
        return redirect()->route('owners.locations.posts.index', ['location' => $location]);
    }
}
