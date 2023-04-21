@extends('layouts.owner_master')
{{--<link href="{{ 'css/house_index.css' }}" rel="stylesheet">--}}
@section('title', '修改系統公告')
@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">公告管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">編輯文章</li>
        </ol>
        <form action="{{route('ad.posts.update', $post->id)}}" method="POST" role="form">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">標題：</label>
                <input name="title" class="form-control" placeholder="請輸入文章標題" value="{{old('title', $post->title)}}">
            </div>
            <div class="form-group">
                <label for="content" class="form-label">內容：</label>
                <textarea id="content" name="content" class="form-control" rows="10">{{old('content', $post->content)}}</textarea>
            </div>
            <div class="text-right">
                <button class="btn btn-primary btn-sm" type="submit">儲存</button>
            </div>
        </form>
    </div>
@endsection
