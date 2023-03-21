@extends('layouts.owner_master')
<link href="{{ 'css/house_index.css' }}" rel="stylesheet">
@section('title', '地點公告')
@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">公告管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">公告一覽表</li>
        </ol>
        <form action="{{route('owners.locations.posts.store')}}" method="post" role="form">
            @method('post')
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">標題</label>
                <input id="title" name="title" type="text" class="form-control" value="{{old('title')}}" placeholder="請輸入公告標題">
            </div>
            <div class="form-group">
                <label for="content" class="form-label">內容</label>
                <textarea id="content" name="content" class="form-control" rows="10" value="{{old('content')}}"></textarea>
            </div>
            <div class="form-group">
                <label for="date" class="form-label">日期</label>
            </div>
            <div class="text-right">
                <button class="btn btn-primary btn-sm" type="submit">儲存</button>
            </div>
        </form>
    </div>
@endsection

