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
    <div class="layout-container">
        <div class="container-fluid px-4 py-3">
            <h2 class="fw-bold "><span class="text-muted fw-light">房屋 /{{ $location->name }} /</span>公告管理</h2>
        <a class="btn btn-outline-secondary"
		   href="{{ route('owners.locations.houses.show',[$location->owner_id, $location->id]) }}">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
				 class="bi bi-box-arrow-left" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					  d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
				<path fill-rule="evenodd"
					  d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
			</svg>
		</a>
            @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            @endif
        @if ($locations->count())
            <a class="btn btn-primary mx-5 my-3" href="{{ route('owners.locations.posts.create', $locations->pluck('id')->first()) }}">新增公告</a>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col" style="text-align: center;width: 20%;font-size: 18px">標題</th>
                <th scope="col" style="text-align: center;width: 60%;font-size: 18px">內容</th>
            </tr>
            </thead>
            <tbody>
            @foreach(  $location -> posts as $post)
                <tr>
                    <td style="text-align: center">{{ $post->title }}</td>
                    <td style="text-align: left">{{ $post->content }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{route('owners.locations.posts.edit',[$location->id, $post->id])}}">編輯</a>
                        <form action="{{route('owners.locations.posts.destroy',  ['location' => $location->id, 'post' => $post->id])}}" method="POST" style="display: inline-block">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger mx-2" type="submit" onclick="return confirm('確定要刪除嗎？')">刪除</button>
                        </form>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
