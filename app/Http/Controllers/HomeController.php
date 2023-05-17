<?php

namespace App\Http\Controllers;
use App\Models\House;
use App\Models\Image;
use App\Models\Location;
use App\Models\Post;
use App\Models\SystemPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        if (!Auth::check()) {
//            return redirect('/');
//        }

        // 驗證使用者是否為系統管理員
        if (Auth::check()) {
            $user = Auth::user();

        if ($user->admin) {
            return redirect()->route('ad.posts.index');
        }
    }
        $houses = House::with('image')->get(); // 預先載入 image 關聯
        //租屋公告
        $housepost=Post::latest()->first();
        //系統公告
        $posts=SystemPost::where('created_at', '>=', Carbon::now()->subDays(3))->latest()->first();

        $view_data = [
            'houses' => $houses,
            'housepost'=>$housepost,
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
