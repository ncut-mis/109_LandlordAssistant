<?php

namespace App\Http\Controllers;
use App\Models\House;
use App\Models\Image;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::with('image')->get(); // 預先載入 image 關聯
        $view_data = [
            'houses' => $houses,
        ];
        return view('index', $view_data);
    }

    public function renters_index()
    {
        return view('renters.home.index');
    }

    public function owners_index()
    {
		//房東管理頁面首頁
		/*$locations = Location::all();
		$houses = $locations->houses;*/
		$locations = Location::with('houses')->get();

		$locations_data = [
            'locations' => $locations,
        ];
        return view('owners.index',$locations_data);
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
    public function show(string $id)
    {
        return view('houses.show');
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
