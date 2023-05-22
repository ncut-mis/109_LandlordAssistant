<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Renter;
use App\Models\House;
use App\Models\Location;
use App\Http\Requests\StoreRenterRequest;
use App\Http\Requests\UpdateRenterRequest;
use App\Models\Signatory;
use Illuminate\Support\Facades\Auth;


class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $user = Auth::user();
        if ($user->admin) {
            return redirect()->route('ad.posts.index');
        }
        $houses = House::whereHas('signatories', function ($q) use ($user){
            $q->where('renter_id', $user->renter->id);
        })->get();
		//查看Post關聯location再到houses再到signstories特定renter_id的資料是否存在
		$posts = Post::whereHas('location.houses', function ($query) use ($user) {
			$query->whereHas('signatories', function ($q) use ($user) {
				$q->where('renter_id', $user->renter->id);
			});
		})->get();
        $hasRentedHouse = $houses->isNotEmpty();
        if ($hasRentedHouse) {
            $houses = Auth::user()->houses()->with(['posts' => function ($query) {
                $query->latest()->first();
            }])->get();
        } else {
            $houses = collect(); // 如果租客沒有租房子，則設置為空的集合
        }

        $hasNewAnnouncement = $posts->isNotEmpty();
        $view_data = [
            'houses' => $houses,
            'posts' => $posts,
            'hasRentedHouse' => $hasRentedHouse,
            'hasNewAnnouncement' => $hasNewAnnouncement,
        ];
        return view('renters.houses.index',$view_data);
    }
    /*public function location_index()
    {
        $houses = House::whereHas('signatories', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with('repairs')->get();

        $locations = $houses->pluck('location')->unique();

        return view('renters.locations.index', compact('locations'));
    }*/
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
    public function store(StoreRenterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
	public function show(House $house)
    {
		$post = request()->query('post');
        $location = $house->location;
        $signatories = $house->signatories; // 取得房屋的目前租客
        $owners = $signatories->map(function ($signatories) {
            return $signatories->renter; // 取得每個合約的租客
        });
        $owners_data = $owners->map(function ($owner) {
            return $owner->user; // 取得每個租客的使用者資料
        });

        $furnishings = $house->furnishings;
        $features = $house->features;
        $image = $house->image;
        $expenses = $house->expenses;
        $unrepair = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '未維修');
        }])->get();
        $inrepair = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '維修中');
        }])->get();
        $finsh = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '已維修');
        }])->get();
        //公告
        $locations = Location::with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->where('id', '=', $location->id)->get();
        $unrepairs = $unrepair->pluck('repairs')->flatten();
        $inrepairs = $inrepair->pluck('repairs')->flatten();
        $finshs = $finsh->pluck('repairs')->flatten();
        $data = [
            'contract' =>$signatories,
            'location_id' =>$location->id,
            'owners_data' => $owners_data,
            'furnishings' => $furnishings,
            'features' => $features,
            'house' => $house,
            'image' => $image,
            'expenses' => $expenses,
            'unrepair' => $unrepairs,
            'inrepair' => $inrepairs,
            'finsh' => $finshs,
            'locations'=>$locations,
            'post'=>$post,
        ];
        return view('renters.houses.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Renter $renter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRenterRequest $request, Renter $renter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renter $renter)
    {
        //
    }
}
