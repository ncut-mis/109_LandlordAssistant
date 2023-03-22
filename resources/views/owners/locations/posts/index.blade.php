@extends('layouts.owner_master')
<link href="{{ 'css/house_index.css' }}" rel="stylesheet">
@section('title', '地點公告')
@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">公告管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">公告一覽表</li>
        </ol>
        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
            <strong>完成！</strong> 成功儲存公告
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="#">新增</a>
        </div>
              <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <!--<th scope="col">標題</th>-->
                <th scope="col" style="text-align: left">標題</th>
                <th scope="col">內容</th>
            </tr>
            </thead>
            <tbody>
            <!-- $posts資料表取單一個* -->
            @foreach($posts as $post)
                <tr>
                    <td style="text-align: right">{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#">編輯</a>
                        /
                        <form action="#" method="POST" style="display: inline-block">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                        </form>

<<<<<<< HEAD
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
                            <form action="#" method="POST" style="display: inline-block">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
{{--            @endforeach--}}
=======
                    </td>

                </tr>
            @endforeach
>>>>>>> origin/master
            </tbody>
        </table>
    </div>
@endsection
