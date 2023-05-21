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
			<li style="display: block;" class="breadcrumb-item active">{{$houses->name}}的公告</li>
		</ol>
		<h1 style="text-align: center">
			<a class="btn btn-outline-secondary"
			   href="{{ route('renters.houses.show',['house' => $houses->id, 'post' => 1])}}">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					 class="bi bi-box-arrow-left" viewBox="0 0 16 16">
					<path fill-rule="evenodd"
						  d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
					<path fill-rule="evenodd"
						  d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
				</svg>
			</a>
			{{$posts->title}}
		</h1>
		<div class='container' style=" border: 4px solid #ccc">
			<p>{{$posts->content}}</p>
			<p style="text-align: right">公告日期：{{$posts->updated_at}}
		</div>
	</div>
@endsection
