<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\Location;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('owners.home.index', [
            'locations' => Location::with('user')->latest()->get(),
        ]);
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
        $validatedData = $request->validate([
                'name' => 'required|max:255',
            ]);

        $owner_id = '1';
        // 建立 Location 資料
        $location = Location::create([
            'name' => $validatedData['name'],
            'owner_id' => $request->owner,
        ]);
//        $location = new Location();
//        $location->name = $request->input('name');
//        $location->owner_id = $request->input('owner_id');
//        $location->save();

//        Location::create([
//            'id'=>$request->id,
//            'introduce'=>$request->introduce,
//            'shelf_status'=>$request->shelf_status,
//            'people'=>$request->people,
//            'amount'=>$request->amount,
//        ]);
//        auth()->user()->locations()->create($validated);
//        $location= new Location();
//        $location->user_id=$request->user()->id;
//        $location->message=$validated['message'];
//        $location->save();
       /* Location::create([
            'user_id'=>$request->user()->id,
            'message'=>$validated['message'],
        ]);*/

        return redirect()->route('owners.home.index',$owner_id)->with('success', '新增成功！');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {

        $locations_data = [
            'location' => $location,
            'name' => $location->name,

        ];
        return view('owners.locations.edit',$locations_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $owner_id='1';
        $$location = new Location;

        $location->name = $request->name;
        $location->save();
//        $data = $request->name;
//        $location->update($data);
//        $location->save($data);
        return redirect()->route('owners.home.index',$owner_id)->with('success', '修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
