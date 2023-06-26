<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SystemPost;
use App\Http\Requests\StoreSystemPostRequest;
use App\Http\Requests\UpdateSystemPostRequest;
use Illuminate\Support\Facades\Auth;

class SystemPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()    {
//        dd('00');
        // 驗證使用者是否已登入
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        if (!$user->admin) {
            return redirect('/');
        }

        $posts = SystemPost::orderBy('created_at', 'DESC')->get();
        $data = ['posts' => $posts];
        return view('ad.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ad.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSystemPostRequest $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required',
        ]);
        $post = new SystemPost([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
//        真實用戶
        $post->admin_id = Auth::user()->admin->id;
//        $post->admin_id = 1;
        $post->save();
        return redirect()->route('ad.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SystemPost $systemPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SystemPost $post)
    {
        $data=[
            'post'=>$post,
        ];
        return view('ad.posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSystemPostRequest $request, SystemPost $post)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required',
        ]);
        $post->update($request->all());
        return redirect()->route('ad.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SystemPost $post)
    {
        $post->delete();
        return redirect()->route('ad.posts.index');
    }
}
