@extends('layouts.owner_master')
<link href="{{ 'css/house_index.css' }}" rel="stylesheet">
@section('title', '地點公告')
@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">公告管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">修改公告</li>
        </ol>
        @if(isset($location))
            <form action="{{ route('owners.locations.posts.update', [$location->id, $post->id]) }}" method="post" role="form">
                @method('patch')
                @csrf
                {{--           <div class="row">--}}
                {{--               <div class="left-column"><h2>{{ $locations->name }}</h2></div>--}}
                {{--           </div>--}}
                <div class="form-group">
                    <label for="title" class="form-label">標題</label>
                    <input id="title" name="title" type="text" class="form-control" value="{{old('title',$post->title)}}" placeholder="請輸入公告標題">
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">內容</label>
                    <textarea id="content" name="content" class="form-control" rows="10">{{old('content',$post->content)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="date" class="form-label">日期</label>
                    <input id="date" name="date" type="date" class="form-control" >
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit">更新</button>
                </div>
            </form>
        @endif
    </div>
@endsection

