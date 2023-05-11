@extends('layouts.renter_master_index')
{{--<link href="{{ 'css/house_index.css' }}" rel="stylesheet">--}}
@section('title', '地點公告')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<style>
    .scroll-to-top {
        position: fixed;
        bottom: 20px;
        right: 10px;
        padding: 8px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        transition: all .3s ease-in-out;
    }

    .scroll-to-top:hover {
        background-color: #eee;
        cursor: pointer;
    }

    .scroll-to-top i {
        font-size: 20px;
        color: #333;
    }
</style>
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
                    <input id="date" name="date" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit">更新</button>
                </div>
            </form>
        @endif
    </div>
@endsection

