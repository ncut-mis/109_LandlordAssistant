@extends('layouts.renter_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '公告頁面')
@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">公告一覽</h1>
        <ol class="breadcrumb mb-4">
            @foreach($houses as $key => $house)
            <li class="breadcrumb-item active">{{$house->name}}的公告</li>
            @endforeach
        </ol>
        <table class="table">
            <thead>
            <tr>
                {{--                <th scope="col">地點名稱</th>--}}
                {{--                <th scope="col">公告標號</th>--}}
                <!--<th scope="col">標題</th>-->
                <th scope="col" style="text-align: left">標題</th>
                <th scope="col">內容</th>
                <th scope="col" style="text-align: right;">日期</th>
            </tr>
            </thead>
            <tbody>

            {{--            @foreach($locations as $location)--}}
            {{--                <h2>{{ $location->name }}</h2>--}}
            @foreach($locations as $key => $location)
                @foreach($location -> posts as $post)
                <tr>
                    {{--                        <td >{{ $location->id }}</td>--}}
                    <td><a href="{{route('renters.houses.posts.show',[$house->id,$post->id])}}">{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td style="text-align: right;" >{{ $post->updated_at }}</td>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
