<?php

namespace App\Http\Controllers;
use App\Models\House;
use App\Models\Image;
use App\Models\Location;
use App\Models\SystemPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::with('image')->get(); // 預先載入 image 關聯
        $posts=SystemPost::all();
        $view_data = [
        'houses' => $houses,
            'posts'=>$posts,
    ];
        return view('index', $view_data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
        $owner = $house->owner;
        $owner_data = $owner->user;
        $furnishings = $house->furnishings;
        $features = $house->features;
        $image = $house->image;
        $expenses = $house->expenses;
        //$image
        $data = [
            'house' => $house,
            'owner' => $owner,
            'owner_data' => $owner_data,
            'furnishings' => $furnishings,
            'features' => $features,
            'image' => $image,
            'expenses' => $expenses,
        ];
        return view('houses.show',$data);
    }

    public function about()
    {
        return view('about');
    }

    public function help()
    {
        return view('help');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
