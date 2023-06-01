<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\Location;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()){
            $validatedData = $request->validate([
                    'name' => 'required|max:255',
                ]);

            $owner_id = Auth::user()->owner->id;
            // 建立 Location 資料
            $location = Location::create([
                'name' => $validatedData['name'],
                'owner_id' => $request->owner,
            ]);


            return redirect()->route('owners.home.index',$owner_id)->with('success', '新增成功！');
        } else{
            return redirect()->route('home.index');
        }
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
        if(Auth::user()){
            $locations_data = [
                'location' => $location,
                'name' => $location->name,

            ];
            return view('owners.locations.edit2',$locations_data);
        } else{
            return redirect()->route('home.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        if(Auth::user()){
            $owner_id=Auth::user()->owner->id;
            //$location = new Location;

            $location->owner_id = $owner_id;
            $location->name = $request->name;
            $location->save();
    //        $data = $request->name;
    //        $location->update($data);
    //        $location->save($data);
            return redirect()->route('owners.home.index',$owner_id)->with('success', '修改成功！');
        } else{
            return redirect()->route('home.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location = Location::findOrFail($location->id);
        if ($location->houses()->where('lease_status', '出租中')->exists()) {
            return redirect()->back()->with('error', '該地點下有出租中的房屋，禁止刪除。');
        }
        $location->delete();

        return redirect()->route('owners.home.index', ['owner' => Auth::user()->owner->id])
            ->with('success', '地點刪除成功！');
    }
}
