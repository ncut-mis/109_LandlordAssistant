<?php

namespace App\Http\Controllers;

use App\Models\Expense;
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

        $view_data = [
            'houses' => $houses,
            'posts' => $posts,
        ];
        $hasRentedHouse = $houses->isNotEmpty();
        if ($hasRentedHouse) {
            //查看Post關聯location再到houses再到signstories特定renter_id的資料是否存在
            $posts = Post::whereHas('location.houses', function ($query) use ($user) {
                $query->whereHas('signatories', function ($q) use ($user) {
                    $q->where('renter_id', $user->renter->id);
                });
            })->latest() // 根據 created_at 欄位進行最新排序
            ->get()
                ->groupBy('location_id') // 根據地點進行分組
                ->map(function ($group) {
                    return $group->sortByDesc('created_at')->first();// 取得每個地點分組中的第一筆公告，即最後一筆公告
                });
            $view_data = ['posts' => $posts];
//            dd($posts);
        } else {
            $houses = collect(); // 如果租客沒有租房子，則設置為空的集合
        }

        if (isset($posts)) {
            $view_data = $view_data + [
                'houses' => $houses,
                'hasRentedHouse' => $hasRentedHouse,
            ];
        } else{
            $view_data = [
                'houses' => $houses,
                'hasRentedHouse' => $hasRentedHouse,
            ];
        }
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

        //費用
        $expenses = $house->expenses;
//        $expenses = House::with(['expenses' => function ($query){
//            $query->orderBy('updated_at', 'desc');
//        }])->where('id','=',$house->id)->get();
        $expenses_we = $house->expenses->whereIn('type',['水費','電費'])->sortByDesc('updated_at');
        $expenses_rentals = $house->expenses->where('type','租金')->sortByDesc('updated_at');
        $expenses_other = $house->expenses->whereNotIn('type',['水費','電費','租金'])->sortByDesc('updated_at');
        $expenses_payoff = $house->expenses->where('renter_status','1')->sortByDesc('updated_at');
        $expenses_unpay  =$house->expenses->where('renter_status','0')->sortByDesc('updated_at');

        $unrepair = House::whereHas('repairs', function ($q) use ($house) {
            $q->where('house_id', '=', $house->id);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '未維修');
            $q->with('repair_replies');
        }])->get();
        $inrepair = House::whereHas('repairs', function ($q) use ($house) {
            $q->where('house_id', '=', $house->id);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '維修中');
            $q->with('repair_replies');
        }])->get();
        $finsh = House::whereHas('repairs', function ($q) use ($house) {
            $q->where('house_id', '=', $house->id);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '已維修');
            $q->with('repair_replies');
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
            'po'=>1,
            'expenses_we' => $expenses_we,
            'expenses_rentals'=>$expenses_rentals,
            'expenses_other' => $expenses_other,
            'expenses_payoff' => $expenses_payoff,
            'expenses_unpay' => $expenses_unpay
        ];
//        dd($data);
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
