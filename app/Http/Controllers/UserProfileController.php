<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {
        if(Auth::user()){
            $id = Auth::id(); //user id
            //$id = 1; //user id
            $users = User::find($id);
            $data = [
                'users' => $users
            ];

            if (Auth::check()) {
                $name = Auth::user()->name;
                return view('users.index', $data,compact('name'));
            }
            else
            {


                return view('users.index', $data);
            }
        } else{
            return redirect()->route('home.index');
        }

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
        if(Auth::user()){
            $name = Auth::user()->name;
            $id = Auth::id(); //user id
            //$id = '1'; //user id
            $users = User::find($id);
            $data = [
                'users' => $users,
                'name' => $name
            ];
            return view('users.edit', $data);
        } else{
            return redirect()->route('home.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request, User $user)
    {
        /*// 先驗證輸入的密碼是否正確
        $password = $request->get('password');

        if (!Hash::check($password, Auth::user()->password)) {
            return redirect()->route('users.index', $user->id)->with('error', '密碼錯誤！');
        } else {
            // 密碼正確
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->account_name = $request->account_name;
            $user->account = $request->account;
            $user->save();
            return redirect()->route('users.index', $user->id)->with('success', '修改成功！');
        }*/
        if(Auth::user()){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->account_name = $request->account_name;
            $user->account = $request->account;
            $user->save();
            return redirect()->route('users.index', $user->id)->with('success', '修改成功！');
        } else{
            return redirect()->route('home.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
