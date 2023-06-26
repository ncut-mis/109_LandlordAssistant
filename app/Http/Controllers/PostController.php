<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Post;
use App\Models\House;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(House $house)
    {
        $locations = Location::whereHas('houses', function ($q) use ($house){
            $q->where('id', '=',  $house);
        })->with('posts')->get();
        $houses = House::findOrFail($house);
        $view_data = [
            'locations' => $locations,
            'houses'=> $houses,
        ];
        return view('renters.houses.posts.index',$view_data);
    }

    public function owners_index($location_id)
    {
        if(Auth::user()){
            $location = Location::with(['posts' => function ($query) {
                $query->orderBy('created_at', 'desc'); // 按照创建时间降序排列帖子
            }])->findOrFail($location_id);
            return view('owners.locations.posts.index', [
                'locations' => collect([$location]),
                'location' => $location
            ]);
        } else{
            return redirect()->route('home.index');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Location $location)
    {
        if(Auth::user()){
            //       dd($location) ;
            $location = Location::with('posts')->where('id', $location->id)->get();
            $location_data=['location'=>$location];
            return view('owners.locations.posts.create', $location_data );
        } else{
            return redirect()->route('home.index');
        }
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
        $post->owner_id = Auth::user()->owner->id;
//        $post->owner_id = 1;
        $location->posts()->save($post);

//        $request->merge(['location_id' => $location->id]);
//        Post::create($request->all());
        //dump &die
        //dd($request->all());

        return redirect()->route('owners.locations.posts.index',$location)->with('success','成功儲存公告!');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house,Post $post)
    {
        if(Auth::user()){
            $post_num=$post->id;
            $house_num=$house->id;
            $house=House::find($house_num);
            $posts = Post::find ($post_num);
            $view_data = [
                'posts'=>$posts,
                'houses'=>$house,
            ];
            return view('renters.houses.posts.show',$view_data);
        } else{
            return redirect()->route('home.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location, Post $post)
    {
        if(Auth::user()){
            return view('owners.locations.posts.edit', compact('location', 'post'));
        } else{
            return redirect()->route('home.index');
        }
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

        return redirect()->route('owners.locations.posts.index', $location)->with('success','修改成功!');
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
