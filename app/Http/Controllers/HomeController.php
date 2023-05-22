<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\House;
use App\Models\Image;
use App\Models\Location;
use App\Models\Post;
use App\Models\SystemPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Signatory;


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

//        $hasNewPosts=false;
//
//        // 驗證使用者是否為系統管理員
//        if (Auth::check()) {
//            $user = Auth::user();
//            if ($user->admin) {
//                return redirect()->route('ad.posts.index');
//            }
//            $lastLoginTime = $user->last_login_at;
//            // 獲取租客資料
//            $renter = $user->renter;
//            if ($renter && $renter->signatory) {
//                $rentedHouse = $renter->signatory->house;
//                if ($rentedHouse) {
//                    $latestPost = $rentedHouse->posts()->latest()->first();
//                    if ($latestPost && $latestPost->updated_at > $lastLoginTime) {
//                        $hasNewPosts = true;
//                    }
//                }
//            }
//
//            $view_data = [
//                'hasNewPosts' => $hasNewPosts,
//            ];
//
//        }
//        $houses = House::with('image')->get(); // 預先載入 image 關聯
//        //租客公告
//        if (isset($view_data)) { //view_data已經存在
//            $view_data += ['houses' => $houses];
//        } else {//view_data尚未存在
//            $view_data = ['houses' => $houses];
//        }
//
//        if (Auth::check()) {
//            $name = Auth::user()->name;
//            return view('index', $view_data, compact('name'));
//        }
//        else
//        {
//
//
//            return view('index', $view_data);
//        }
//


        $name='';
       // $houses = House::with('image')->get(); // 預先載入 image 關聯
        $lastSystemPost = SystemPost::latest()->first();

        if (Auth::check()) {

            $name = Auth::user()->name;
            $user = Auth::user();
            // 驗證使用者是否為系統管理員
            if ($user->admin) {
                return redirect()->route('ad.posts.index');
            }
            else {

                // 檢查並取回 Session 中的搜尋結果
                if (Session::has('search_result')) {
                    $houses = Session::get('search_result');
                    $view_data['houses'] = $houses;
                }
                else {
                    $houses = House::with('image')->get();
                    $view_data['houses'] = $houses;
                }

                return view('index', $view_data, compact('name'));
            }

        } else {

            if (Session::has('search_result')) {
                $houses = Session::get('search_result');
                $view_data['houses'] = $houses;
            }
            else {
                $houses = House::with('image')->get();
                $view_data['houses'] = $houses;
            }
            return view('index', $view_data);
        }


    }

    public function clearSearchSession()
    {
        Session::forget('search_result');
        return redirect()->route('home.index');
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
        $name='';
        if (Auth::check()) {
            $name = Auth::user()->name;}
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
        return view('houses.show',$data,compact('name'));
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
