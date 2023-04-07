@extends('layouts.renter_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '公告頁面')
@section('page-content')
    <div class="container">
        <h1>公告列表 - {{ $location->name }}</h1>

        @if ($location->posts->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>標題</th>
                    <th>內容</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($location->posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>此地點尚無公告</p>
        @endif
    </div>
@endsection
