@extends('layouts.renter_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '租客頁面')
@section('page-content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <style>
        body {background:url("https://dl.dropboxusercontent.com/u/80156998/other/1.png"); background-size:cover;}

        * {box-sizing:border-box}
        input {
            width:175px;
            padding:10px;
            border-radius:4px;
            border:1px solid white;
            box-shadow:inset 0px 0px 3px #121212;
            z-index:1;
            transition:all 0.5s;
            font-family:Open Sans, sans-serif;
            font-size:15px;
        }

        input:focus {
            width:230px;
            border-radius:16px;
            box-shadow:0px 0px 8px #0099AD,inset 0px 0px 3px #121212;
        }

        .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
            7px 7px 20px 0px rgba(0,0,0,.1),
            4px 4px 5px 0px rgba(0,0,0,.1);
            outline: none;
        }


        /* 12 */
        .btn-12{
            position: relative;
            right: 20px;
            bottom: 20px;
            border:none;
            box-shadow: none;
            width: 130px;
            height: 40px;
            line-height: 42px;
            -webkit-perspective: 230px;
            perspective: 230px;
        }
        .btn-12 span {
            background: rgb(0,172,238);
            background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%);
            display: block;
            position: absolute;
            width: 130px;
            height: 40px;
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
            7px 7px 20px 0px rgba(0,0,0,.1),
            4px 4px 5px 0px rgba(0,0,0,.1);
            border-radius: 5px;
            margin:0;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all .3s;
            transition: all .3s;
        }
        .btn-12 span:nth-child(1) {
            box-shadow:
                -7px -7px 20px 0px #fff9,
                -4px -4px 5px 0px #fff9,
                7px 7px 20px 0px #0002,
                4px 4px 5px 0px #0001;
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transform: rotateX(90deg);
            -webkit-transform-origin: 50% 50% -20px;
            -moz-transform-origin: 50% 50% -20px;
            transform-origin: 50% 50% -20px;
        }
        .btn-12 span:nth-child(2) {
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transform: rotateX(0deg);
            -webkit-transform-origin: 50% 50% -20px;
            -moz-transform-origin: 50% 50% -20px;
            transform-origin: 50% 50% -20px;
        }
        .btn-12:hover span:nth-child(1) {
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
            7px 7px 20px 0px rgba(0,0,0,.1),
            4px 4px 5px 0px rgba(0,0,0,.1);
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transform: rotateX(0deg);
        }
        .btn-12:hover span:nth-child(2) {
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
            7px 7px 20px 0px rgba(0,0,0,.1),
            4px 4px 5px 0px rgba(0,0,0,.1);
            color: transparent;
            -webkit-transform: rotateX(-90deg);
            -moz-transform: rotateX(-90deg);
            transform: rotateX(-90deg);
        }



    </style>
    @if(session('yes'))
        <div class="alert alert-success">
            {{ session('yes') }}
        </div>

    @elseif (session('no'))
        <div class="alert alert-danger">
            {{ session('no') }}
        </div>
    @endif
    <div class="from-group mb-3 px-3 py-2">
        <div class="house" style="padding: 20px;border: 1px solid #ccc;">
            <label for="content" class="form-label"><h3>房屋列表</h3></label>
            <div>
                填寫邀請碼加入房屋<br>
                <form action="{{ route('owners.houses.rts.store') }}" method="POST">
                    @csrf
                <input placeholder="填寫邀請碼" name="invite_code" value="">
                <button class="custom-btn btn-12" type="submit"><span>確定送出</span><span>送出</span></button>

            </form>
            <br>
            @foreach ($houses as $key =>$house)
                <div class="tab-pane show active fade" id="repair-all" role="tabpanel"
                     style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                    <div class="row">
                        <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                             aria-expanded="false" aria-controls="houses{{ $key }}"
                             style="width:20%;padding: 20px;"><h2>{{ $house->name }}</h2></div>
                        <div class="center-column" style="width:60%;padding: 30px;">
                            @foreach($house -> expenses as $expense)
                                租金：{{$expense -> amount}}元&emsp;&emsp;
                            @endforeach
                            @foreach($house -> contracts as $contract)
                                結束日期：{{$contract -> end_date}}
                            @endforeach
                        </div>
                        <div class="column" style="width:10%;padding: 20px;">
                            <a class="btn btn-primary" href="{{ route('renters.houses.show', $house->id) }}">詳細資訊</a>&emsp;
                        </div>
                            <div class="right-column" style="width:10%;padding: 20px;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    其他選項
                                </button>&emsp;
                                <ul class="dropdown-menu location" style="min-width:6.8rem">
                                    <form action="{{ route('renters.houses.posts.index', $house->id) }}"
                                          method="GET">
                                        @csrf
                                        <li>
                                            <button class="dropdown-item">查看公告</button>
                                        </li>
                                    </form>
                                    <form action="{{ route('renters.houses.repairs.in.house.create', $house->id) }}"
                                          method="GET">
                                        @csrf
                                        <li>
                                            <button class="dropdown-item">報修</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if($key >= 0)
                    <br>
                @endif
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection
