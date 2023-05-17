@extends('layouts.renter_master_index')
{{--<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">--}}
{{--<link href="{{asset('css/post_show.css')}}">--}}
@section('title', '公告頁面')
@section('page-content')
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        h1 {
            font-size: 32px;
            text-align: center;
        }

        p {
            text-align: justify;
            margin-bottom: 1.5em;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            margin-bottom: 1.5em;
        }

        body {
            text-align: center;
        }

        .container {
            border: 4px solid #ccc;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{$houses->name}}的公告</li>
            </ol>
                <h1 style="text-align: center">{{$posts->title}}</h1>
                <div class='container' style=" border: 4px solid #ccc">
                    <p>{{$posts->content}}</p>
                    <p style="text-align: right">公告日期：{{$posts->updated_at}}
                </div>
@endsection
