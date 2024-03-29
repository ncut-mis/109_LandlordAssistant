<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\House;
use App\Models\Location;
use App\Models\Furnish;
use App\Models\Expense;
use App\Models\Image;
use App\Models\Feature;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($owner, Location $location)
    {
		//
    }
    public function search(Request $request)
    {

//        $furnishings1 = $request->input('furnishings1');
//        $furnishings2 = $request->input('furnishings2');
//        $furnishings3 = $request->input('furnishings3');
//        $furnishings4 = $request->input('furnishings4');
//
//        // 取得features1 ~ features5的值
//        $features1 = $request->input('features1');
//        $features2 = $request->input('features2');
//        $features3 = $request->input('features3');
//        $features4 = $request->input('features4');
//        $features5 = $request->input('features5');
//        if (Auth::check()) {
//            $county = $request->input('county');
//            $area = $request->input('district');
//            $selecthouse = $request->input('selecthouse');
//            if (isset($area)) {
//                // 執行搜尋邏輯，假設你的房屋模型是 House
//                $houses = House::where('county', $county)
//                    ->where('area', $area)
//                    ->where('name', 'like', '%' . $selecthouse . '%')
//                    ->with('image') // 預先載入圖片關聯
//                    ->get();
//
//                $name = Auth::user()->name;
//
//                // 將搜尋結果存儲到 Session
//                Session::put('search_result', $houses);
//
//                return redirect()->route('home.index')->with(compact('name'));
//            } elseif (isset($county) && !isset($area)) {
//                // 執行搜尋邏輯，假設你的房屋模型是 House
//                $houses = House::where('county', $county)
//                    ->where('name', 'like', '%' . $selecthouse . '%')
//                    ->with('image') // 預先載入圖片關聯
//                    ->get();
//
//                $name = Auth::user()->name;
//
//                // 將搜尋結果存儲到 Session
//                Session::put('search_result', $houses);
//
//                return redirect()->route('home.index')->with(compact('name'));
//            } else {
//                $houses = House::where('name', 'like', '%' . $selecthouse . '%')
//                    ->with('image') // 預先載入圖片關聯
//                    ->get();
//
//
//                // 將搜尋結果存儲到 Session
//                Session::put('search_result', $houses);
//
//                return redirect()->route('home.index');
//
//            }
//        } else {
//
//                $county = $request->input('county');
//                $area = $request->input('district');
//                $selecthouse = $request->input('selecthouse');
//                if (isset($area)) {
//                    // 執行搜尋邏輯，假設你的房屋模型是 House
//                    $houses = House::where('county', $county)
//                        ->where('area', $area)
//                        ->where('name', 'like', '%' . $selecthouse . '%')
//                        ->with('image') // 預先載入圖片關聯
//                        ->get();
//
//
//                    // 將搜尋結果存儲到 Session
//                    Session::put('search_result', $houses);
//
//                    return redirect()->route('home.index');
//                } elseif (isset($county) && !isset($area)) {
//                    // 執行搜尋邏輯，假設你的房屋模型是 House
//                    $houses = House::where('county', $county)
//                        ->where('name', 'like', '%' . $selecthouse . '%')
//                        ->with('image') // 預先載入圖片關聯
//                        ->get();
//
//
//                    // 將搜尋結果存儲到 Session
//                    Session::put('search_result', $houses);
//
//                    return redirect()->route('home.index');
//                } else {
//                    $houses = House::where('name', 'like', '%' . $selecthouse . '%')
//                        ->with('image') // 預先載入圖片關聯
//                        ->get();
//
//
//
//                    // 將搜尋結果存儲到 Session
//                    Session::put('search_result', $houses);
//
//                    return redirect()->route('home.index');

//                }
        $county = $request->input('county');
        $area = $request->input('district');
        $selecthouse = $request->input('selecthouse');

        $furnishings1 = $request->input('furnishings1');
        $furnishings2 = $request->input('furnishings2');
        $furnishings3 = $request->input('furnishings3');
        $furnishings4 = $request->input('furnishings4');

        $features1 = $request->input('features1');
        $features2 = $request->input('features2');
        $features3 = $request->input('features3');
        $features4 = $request->input('features4');
        $features5 = $request->input('features5');

        $query = House::query();

        if (isset($area)) {
            $query->where('county', $county)
                ->where('area', $area);
        } elseif (isset($county) && !isset($area)) {
            $query->where('county', $county);
        }

        $query->where('name', 'like', '%' . $selecthouse . '%');

// 應用 furnishings 條件
        $furnishings = array_filter([$furnishings1, $furnishings2, $furnishings3, $furnishings4]);
        if (!empty($furnishings)) {
            $query->whereHas('furnishings', function ($query) use ($furnishings) {
                $query->whereIn('furnish', $furnishings);
            });
        }

// 應用 features 條件
        $features = array_filter([$features1, $features2, $features3, $features4, $features5]);
        if (!empty($features)) {
            $query->whereHas('features', function ($query) use ($features) {
                $query->whereIn('feature', $features);
            });
        }

// 執行搜尋並載入關聯模型
        $houses = $query->with('image')->get();

// 將搜尋結果存儲到 Session
        Session::put('search_result', $houses);

        if (Auth::check()) {
            $name = Auth::user()->name;
            return redirect()->route('home.index')->with(compact('name'));
        } else {
            return redirect()->route('home.index');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($location)
    {
        if(Auth::user()){
            $locations = Location::find($location);
            $owner_id = $locations->owner->id;
            $locations_data = [
                'locations' => $locations,
                'owner_id' => $owner_id,
            ];
            return view('owners.locations.houses.create2',$locations_data);
        } else{
            return redirect()->route('home.index');
        }
    }

    public function advance_search_create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$location)
    {
        //dd($request->image);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'county' => 'required|max:255',
            'area' => 'required|max:255',
            'address' => 'required|max:255',
            'furnish.*' => 'required|max:255',
        ], [
            'name.required' => '請輸入房屋名稱。',
            'name.max' => '房屋名稱不得超過255個字元。',
            'county.required' => '請輸入縣市。',
            'area.required' => '請輸入地區。',
            'address.required' => '請輸入地址。',
            'address.max' => '地址不得超過255個字元。',
            'furnish.*.required' => '請輸入設備。',
            'furnish.*.max' => '設備不得超過255個字元。',
        ]);

        //狀態等房屋底下的尚未全部可儲存

        $l = Location::find($location);
        $owner_id = $l->owner->id;

        if(isset($_REQUEST['publish'])){
            $validatedData1 = $request->validate([
                'image' => 'required',
                'name' => 'required',
                'county' => 'required',
                'area' => 'required',
                'address' => 'required',
                'introduce' => 'required',
                'rentals' => 'required',
                'interval' => 'required',
                'num_renter' => 'required',
                'min_period' => 'required',
                'pattern' => 'required',
                'size' => 'required',
                'type' => 'required',
                'floor' => 'required',
                'furnishings' => 'required',
                'features' => 'required',
            ],[
                'image.required' => '請添加圖片。',
                'name.required' => '請輸入房屋名稱。',
                'county.required' => '請輸入縣市。',
                'area.required' => '請輸入地區。',
                'address.required' => '請輸入地址。',
                'introduce.required' => '請輸入介紹。',
                'rentals.required' => '請輸入金額。',
                'interval.required' => '請輸入繳納區間。',
                'num_renter.required' => '請輸入可住人數。',
                'min_period.required' => '請輸入最短租期。',
                'pattern.required' => '請輸入格局。',
                'size.required' => '請輸入坪數。',
                'type.required' => '請輸入類型。',
                'floor.required' => '請輸入樓層。',
                'furnishings.required' => '請輸入設備。',
                'features.required' => '請輸入特色。',
            ]);
            $lease_status = "已刊登";
        }else if(isset($_REQUEST['unpublish'])){
            $lease_status = "閒置";
        }
//        $invitation_code=Str::random(8);
        // 建立 House 資料
        $invitation_code = mt_rand(1000, 9999);

        $house = House::create([
            'name' => $validatedData['name'],
            'county' => $validatedData['county'],
            'area' => $validatedData['area'],
            'address' => $validatedData['address'],
            'lease_status' => $lease_status,
            'introduce' => $request->introduce,
            'rentals' => $request->rentals,
            'interval' => $request->interval,
            'num_renter' => $request->num_renter,
            'min_period' => $request->min_period,
            'pattern' => $request->pattern,
            'size' => $request->size,
            'type' => $request->type,
            'floor' => $request->floor,
            'location_id' => $location,
            'owner_id' => $owner_id,
            'invitation_code' => $invitation_code,

        ]);

        // 儲存動態增加的圖片路徑
        //$images = $request->input('image', []);
        //        foreach($request->file('image') as $image){

        //foreach($request->image as $key => $image) {
        if($request->file('image') != null){
            foreach($request->file('image') as $key => $image) {
                //影像圖檔名稱
                $file_name = uniqid().'.'.$image->getClientOriginalExtension();
                //把檔案存到公開的資料夾
                $file_path = public_path('image/'.$file_name);
                move_uploaded_file($image->getPathname(), $file_path);

                //$file_path = $image->move(public_path('image'), $image);
                //$path = $image->storeAs('public/images', $image->getClientOriginalName());
                //$relativePath = str_replace('public', '/storage', $path);
                $imageModel = new Image([
                    'house_id' => $house->id,
                    'image' => $file_name,
                ]);

                //dd($imageModel);
                $house->image()->save($imageModel);
            }
        }
        $house_id = $house->id;



        /*    // 建立 Expense 資料
            $expense = new Expense([
                'house_id' => $house_id,
                'type' => "租金",
                'amount' => $request->amount,
                'interval' => $request->interval,
            ]);
            // 透過關聯存取資料庫
        $house->expenses()->save($expense);*/




        // 建立 Furnish 資料
        if ($request->furnishings !== null) {
            // 新增特色
            foreach ($request->furnishings as $furnish) {
                $newFurnish = new Furnish([
                    'house_id' => $house->id,
                    'furnish' => $furnish,
                ]);
                $house->furnishings()->save($newFurnish);
            }
        }

        // 建立 Feature 資料
        if ($request->features !== null) {
            // 新增特色
            foreach ($request->features as $feature) {
                $newFeature = new Feature([
                    'house_id' => $house->id,
                    'feature' => $feature,
                ]);
                $house->features()->save($newFeature);
            }
        }

//        return redirect()->route('owners.houses.show',[$owner_id, $location,$house])->with('success', '儲存成功！');
        return redirect()->route('owners.houses.show',$house_id)->with('success', '儲存成功！');
    }

    /**
     * Display the specified resource.
     */
    public function show($owner, Location $location)
    {
        if(Auth::user()){
            //抓取全部房屋
            $houses = $location->houses;
            //抓取出租中房屋
            $for_rent = $location->houses->where('lease_status', '出租中');
            //抓取已刊登房屋
            $listed = $location->houses->where('lease_status', '已刊登');
            //抓取閒置房屋
            $vacancy = $location->houses->where('lease_status', '閒置');


            $data = [
                'owner_id' => $owner,
                'location' => $location,
                'houses' => $houses,
                'for_rent' => $for_rent,
                'listed' => $listed,
                'vacancy' => $vacancy,
            ];
            return view('owners.locations.houses.show2',$data);
        } else{
            return redirect()->route('home.index');
        }
    }

    public function advance_search(House $house)
    {
        //
    }

    public function by_status(House $house)
    {
        //查看某狀態房屋資訊
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location, House $house)
    {
        if(Auth::user()){

            $furnish = $house->furnishings;
            $feature = $house->features;
            $locations_data = [
                'locations' => $location,
                'houses' => $house,
                'furnish' => $furnish,
                'feature' => $feature,
                'owner_id' => $location->owner_id,
            ];
            return view('owners.locations.houses.edit2',$locations_data);
        } else{
            return redirect()->route('home.index');
        }
    }

    public function publish_edit(House $house)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location, House $house)
    {
        // 從請求中獲取表單提交的數據
        $data = $request->only([
            'name',
            'county',
            'area',
            'address',
            'introduce',
			'rentals',
            'interval',
            'num_renter',
            'min_period',
            'pattern',
            'size',
            'type',
            'floor',
        ]);

        if(isset($_REQUEST['publish']) || isset($_REQUEST['unpublish'])){
            if(isset($_REQUEST['publish'])){
                $v_house = House::where('id', $house->id)
                    ->whereNotNull('introduce')
					->whereNotNull('rentals')
					->whereNotNull('interval')
                    ->whereNotNull('lease_status')
                    ->whereNotNull('num_renter')
                    ->whereNotNull('min_period')
                    ->whereNotNull('pattern')
                    ->whereNotNull('size')
                    ->whereNotNull('type')
                    ->whereNotNull('floor')
                    ->first();
				$v_image = $house->image
                    ->whereNotNull('image')
                    ->first();
                $v_furnish = $house->furnishings
                    ->whereNotNull('furnish')
                    ->first();
                $v_feature = $house->features
                    ->whereNotNull('feature')
                    ->first();

                if ($v_house && $v_furnish && $v_feature && $v_image) {
                    // 沒有 NULL 值
                    $lease_status = "已刊登";
                    $data = array_merge(
                        ['lease_status' => $lease_status],$data
                    );
                    $house->update($data);
                    return redirect()->back()->with('success', '刊登成功!');
                } else {
                    // 有 NULL
                    return redirect()->back()->with('error', '刊登失敗，請完善資料');
                }
            }else if(isset($_REQUEST['unpublish'])){
                $lease_status = "閒置";
                $data = array_merge(
                    ['lease_status' => $lease_status],$data
                );
                $house->update($data);
                return redirect()->back()->with('success', '取消刊登成功!');
            }
            // 從請求中獲取表單提交的數據
        }
        //dd($data);
        $house->update($data);
//dd($request->images);
        // 檢查照片是否需要刪除
        if ($request->images !== null) {
            //獲取所有照片
            foreach ($request->images as $image) {
                //dump($image);
                $existingImage = $house->image()->pluck('image')->all();
                //dump($existingImage);
                //找出那些照片不在 $request->images 集合中的照片
                $imagesToDelete = array_diff($existingImage, $request->images);
                //dump($imagesToDelete);
                if($imagesToDelete !== null){
                    foreach ($imagesToDelete as $imageToDelete) {
                        $house->image()->where('image', $imageToDelete)->delete();
                    }
                }else{
                    $house->image()->where('image', $imageToDelete)->delete();
                }
            }
        }else{
            $house->image()->delete();
        }
        //dd($request->file('image'));

        //更新照片
        if ($request->file('image') !== null) {
            // 新增照片
            foreach ($request->file('image') as $key => $image) {
                // 不存在照片的設備，可以新增
                //影像圖檔名稱
                $file_name = uniqid().'.'.$image->getClientOriginalExtension();
                //把檔案存到公開的資料夾
                $file_path = public_path('image/'.$file_name);
                //dump($file_name);
                move_uploaded_file($image->getPathname(), $file_path);
                $newImage = new Image([
                    'house_id' => $house->id,
                    'image' => $file_name,
                ]);


                $house->image()->save($newImage);
            }
        }

        /*foreach($request->file('image') as $key => $image) {
            //影像圖檔名稱
            $file_name = $request->id.'_'.time().'.'.$image->getClientOriginalExtension();
            //把檔案存到公開的資料夾
            $file_path = public_path('image/'.$file_name);
            move_uploaded_file($image->getPathname(), $file_path);

            //$file_path = $image->move(public_path('image'), $image);
            //$path = $image->storeAs('public/images', $image->getClientOriginalName());
            //$relativePath = str_replace('public', '/storage', $path);
            $imageModel = new Image([
                'house_id' => $house->id,
                'image' => $file_name,
            ]);
            //dd($imageModel);
            $house->image()->save($imageModel);
        }*/

        // 更新租屋費用信息

        /*if ($house->expenses !== null) {
            foreach ($house->expenses as $expense) {
                $expense->amount = $request->amount;
                $expense->interval = $request->interval;
                $expense->save();
            }
        }*/

        // 檢查設備是否需要刪除
//        dd($request->furnishings);
        if ($request->furnishings !== null) {
            //獲取所有照片
            foreach ($request->furnishings as $furnish) {
                $existingFurnishings = $house->furnishings()->pluck('furnish')->all();
                    //dump($existingFurnishings);
                //找出那些設備不在 $request->furnishings 集合中的設備
                $furnishingsToDelete = array_diff($existingFurnishings, $request->furnishings);
                    //dd($furnishingsToDelete);
                if($furnishingsToDelete !== null){
                    foreach ($furnishingsToDelete as $furnishToDelete) {
                        $house->furnishings()->where('furnish', $furnishToDelete)->delete();
                    }
                }else{
                    $house->furnishings()->where('furnish', $furnishToDelete)->delete();
                }
            }
        }else{
            $house->furnishings()->delete();
        }

        //更新設備
        if ($request->furnishings !== null) {
            // 新增設備
            foreach ($request->furnishings as $furnish) {
                // 檢查設備是否已經存在
                if (!$house->furnishings()->where('furnish', $furnish)->exists()) {
                    // 不存在重複的設備，可以新增
                    $newFurnish = new Furnish([
                        'house_id' => $house->id,
                        'furnish' => $furnish,
                    ]);
                    $house->furnishings()->save($newFurnish);
                }
            }
        }


        // 檢查特色是否需要刪除
        if ($request->features !== null) {
            //獲取所有特色
            foreach ($request->features as $feature) {
                $existingFeatures = $house->features()->pluck('feature')->all();
             //   dump($existingFeatures);
                //找出那些特色不在 $request->features 集合中的特色
                $featuresToDelete = array_diff($existingFeatures, $request->features);
              //  dd($featuresToDelete);
                if($featuresToDelete !== null){
                    foreach ($featuresToDelete as $featureToDelete) {
                        $house->features()->where('feature', $featureToDelete)->delete();
                    }
                }else{
                    $house->features()->where('feature', $featureToDelete)->delete();
                }
            }
        }else{
            $house->features()->delete();
        }
        // 檢查特色是否需要刪除
        //獲取所有特色
       /* $existingFeatures = $house->features()->pluck('feature')->all();
        //dump($existingFeatures);
        //找出那些特色不在 $request->features 集合中的特色
        $featuresToDelete = array_diff($existingFeatures, $request->features);
        //dd($featuresToDelete);
        foreach ($featuresToDelete as $featureToDelete) {
            $house->features()->where('feature', $featureToDelete)->delete();
        }*/
        //更新特色
        if ($request->features !== null) {
            // 新增特色
            foreach ($request->features as $feature) {
                // 檢查特色是否已經存在
                if (!$house->features()->where('feature', $feature)->exists()) {
                    // 不存在重複的特色，可以新增
                    $newFeature = new Feature([
                        'house_id' => $house->id,
                        'feature' => $feature,
                    ]);
                    $house->features()->save($newFeature);
                }
            }
        }

        // 重定向到單一地點下房屋頁面
        return redirect()->route('owners.locations.houses.show', [$location->owner->id, $location->id])->with('success', '修改成功！');
    }

    public function publish_update()
    {
        //
    }

    public function unpublish_update(House $house)
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, House $house)
    {
        if (!$house) {
            return redirect()->back()->with('error', '房屋找不到');
        }
        if($house->lease_status !== "出租中"){
            $house->delete();
            return redirect()->back()->with('success', '房屋刪除成功');
        }else{
            return redirect()->back()->with('error', '該房屋正在出租中，不能刪除');
        }
    }
}
