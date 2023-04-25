<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {

        $id = 1; //user id
        $users = User::find($id);
        $data  = [
            'users' => $users
        ];
        return view('users.test_index',$data);
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
    public function store(StoreUserProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $id = '1'; //user id
        $users = User::find($id);
        $data  = [
            'users' => $users
        ];
        return view('users.test_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->account_name = $request->account_name;
        $user->account = $request->account;
        $user->save();

        return redirect()->route('users.index',$user->id)->with('success', '修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
