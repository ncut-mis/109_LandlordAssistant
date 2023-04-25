@extends('layouts.test_master')
@section('title', '房間介紹')
@section('content')
    <style>
        .cc {
            font-size: 30px;
            font-weight: bold;
            display: inline-block;
            color: rgb(194, 6, 6);
        }

        .bb {
            font-size: 25px;
            font-weight: bold;
            display: inline-block;
            color: rgb(168, 141, 105);
        }

        .button4 {
            font-size: 16px;
            padding: 6px;
            background-color: white;
            color: #779d87;
            border: 2px solid #779d87;
            border-radius: 8px;
            text-decoration: none;
        }

        .button4:hover {
            background-color: #afbbb2;
            color: #ffffff;
            border: 2px solid #afbbb2;
        }

        .main {
            width: 60%;
            margin: 50px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .avatar img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 0px;
            margin-right: 30px;
        }
    </style>

    <section id="main">
        <div class="container">
            <div class="col-12">

                <!-- Blog -->
                <section class="box blog">
                    <h2 class="major"><span>{{ $house->name }}</span></h2>
                    <div>
                        <div class="row">
                            <div class="col-9 col-12-medium">
                                <div class="content">

                                    <!-- Featured Post -->
                                    <article class="box post">
                                        <header>
                                            <h3>{{ $house->county }} {{ $house->area }} {{ $house->address }}</h3>
                                            <h2>
                                                <a style="font-size: xxx-large; color: #b02a37">${{ number_format($expenses->value('amount')) }}</a>/月
                                                <div class="bb">
                                                    @if( $expenses->value('interval') == 12)
                                                        ｜年繳
                                                    @elseif( $expenses->value('interval') == 6)
                                                        ｜半年繳
                                                    @elseif( $expenses->value('interval') == 3)
                                                        ｜季繳
                                                    @elseif( $expenses->value('interval') == 1)
                                                        ｜月繳
                                                    @endif</div>
                                            </h2>
                                            <ul class="meta">
                                                <li class="icon fa-clock">上架日期: {{ $house->created_at}}</li>
                                                <li class="icon fa-comments">看過的人數</li>
                                            </ul>
                                            <br>

                                            @foreach($furnishings as $furnishings)
                                                <a class="button4">{{ $furnishings->furnish }}</a>
                                            @endforeach<br><br>

                                            @foreach($features as $features)
                                                <a class="button4">{{ $features->feature }}</a>
                                            @endforeach
                                        </header>
                                        @foreach($house->image as $image)
                                            <a href="#" class="image featured"><img
                                                    src="{{ asset('image/'.$image->image) }}" alt="123"/></a>
                                        @endforeach
                                        <p>
                                            {{ $house->introduce }}
                                        </p>

                                    </article>
                                </div>
                            </div>

                            <div class="col-3 col-12-medium">
                                <div class="sidebar">

                                    <ul class="divided">
                                        <li>
                                            <h4>房型:
                                                <div class="cc">
                                                    {{ $house->type }}</div>
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>可住人數:
                                                <div class="cc">
                                                    {{ $house->num_renter }}</div>
                                                人
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>最短租期:
                                                <div class="cc">
                                                    {{ $house->min_period }}</div>
                                                個月
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>房間數量:
                                                <div class="cc">
                                                    {{ $house->pattern }}</div>
                                                間
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>房間坪數:
                                                <div class="cc">
                                                    {{ $house->size }}</div>
                                                坪
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>房間樓層:
                                                <div class="cc">
                                                    {{ $house->floor }}</div>
                                                樓
                                            </h4>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="major"><span>房東資訊</span></h2>
                    <div class="main">
                        <div class="main">
                            <div class="avatar"><img src="{{ asset('image/userimage.png') }}" alt="Image"></div>
                        </div>
                        <div class="main">
                            <div class="row">
                                <h3>房東姓名</h3>
                                <h3>房東電話</h3>
                            </div>
                            <div class="row">
                                <h2>{{ $owner_data->name }}</h2>
                                <h2>{{ $owner_data->phone }}</h2>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
@endsection
