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
		   href="{{ route('owners.locations.houses.show',[$location->owner_id, $location->id]) }}">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
				 class="bi bi-box-arrow-left" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					  d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
				<path fill-rule="evenodd"
					  d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
			</svg>
		</a>
		<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">公告一覽表</li>
        </ol>
        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
            <strong>完成！</strong> 成功儲存公告
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @if ($locations->count())
            <a class="btn btn-success btn-sm" href="{{ route('owners.locations.posts.create', $locations->pluck('id')->first()) }}">新增</a>
        @endif
        <table class="table">
            <thead>
            <tr>
                {{--                <th scope="col">地點名稱</th>--}}
                {{--                <th scope="col">公告標號</th>--}}
                <!--<th scope="col">標題</th>-->
                <th scope="col" style="text-align: left">標題</th>
                <th scope="col">內容</th>
            </tr>
            </thead>
            <tbody>

            {{--            @foreach($locations as $location)--}}
            {{--                <h2>{{ $location->name }}</h2>--}}
            @foreach(  $location -> posts as $post)
                <tr>
                    {{--                        <td >{{ $location->id }}</td>--}}
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('owners.locations.posts.edit',[$location->id, $post->id])}}">編輯</a>
                        /
                        <form action="{{route('owners.locations.posts.destroy',  ['location' => $location->id, 'post' => $post->id])}}" method="POST" style="display: inline-block">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                        </form>

{{--            @foreach($locations as $location)--}}
{{--                <h2>{{ $location->name }}</h2>--}}
{{--                @foreach(  $location -> posts as $post)--}}
{{--                    <tr>--}}
{{--                        <td >{{ $location->id }}</td>--}}
{{--                        <td>{{ $post->title }}</td>--}}
{{--                        <td>{{ $post->content }}</td>--}}
{{--                        <td>--}}
{{--                            <a class="btn btn-sm btn-primary" href="{{route('owners.locations.posts.edit',[$location->id, $post->id])}}">編輯</a>--}}
{{--                            /--}}
{{--                            <form action="#" method="POST" style="display: inline-block">--}}
{{--                                {{method_field('DELETE')}}--}}
{{--                                {{csrf_field()}}--}}
{{--                                <button class="btn btn-sm btn-danger" type="submit">刪除</button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
