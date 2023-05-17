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
		<a class="btn btn-outline-secondary"
		   href="{{ route('owners.locations.posts.index',$location[0]->id) }}">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
				 class="bi bi-box-arrow-left" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					  d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
				<path fill-rule="evenodd"
					  d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
			</svg>
		</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">新增公告</li>
        </ol>
        @if(isset($location))
            <form action="{{route('owners.locations.posts.store',$location->pluck('id')->first())}}" method="post" role="form">
                @method('post')
                @csrf
                {{--           <div class="row">--}}
                {{--               <div class="left-column"><h2>{{ $locations->name }}</h2></div>--}}
                {{--           </div>--}}
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
                    <input id="date" name="date" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit">儲存</button>
                </div>
            </form>
        @endif
    </div>
@endsection

