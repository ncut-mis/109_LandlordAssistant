@extends('layouts.master')
@section('title', '測試')
@section('content')
    <style>
        /* tw-city 替換適合的 css 樣式 */
        .my-style-selector select {
            font-size: 20px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-color: #a1cd9b;
            border-width: 2px;
            border-radius: 1em; /*框的圓角值*/
            color: rgba(6, 61, 9, 0.34);
            margin-left: 20px;
            outline: none;
            padding: .3em 1.25em;
        }

        input[type=text1] {
            width: 500px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 1em;;
            font-size: 16px;
            background-color: white;
            background-image: url('image/search.png');
            background-position: 10px 13px;
            background-size: 27px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            transition: width 0.4s ease-in-out;
        }

        .text-truncate {
            Overflow: hidden;
            max-height: 6rem;
            line-height: 1.5rem; /*行高*/
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            text-overflow: ellipsis;
            display: block;
        }

        .text-truncate2 {
            Overflow: hidden;
            max-height: 1.5rem;
            line-height: 2rem; /*行高*/
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            text-overflow: ellipsis;
            display: block;
        }
    </style>

    <!-- Banner -->

    <section id="banner">
        <div class="row">
            <div class="col">
                <div role="tw-city-selector" class="my-style-selector"></div>
            </div>
            <div class="col">
                <input type="text1" placeholder="請輸入社區名、街道或商圈名..." aria-label="Last name">
                <button class="btn" type="button" id="button-addon2">搜尋</button>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="notice">{{ $post->content }}
                        {{--                                <span class="close-button">&times;</span>--}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row gtr-200">


                <div class="col-12">

                    <!-- Features -->
                    <section class="box features">
                        <h2 class="major"><span>你可能會喜歡....</span></h2>
                        <!-- 顯示公告 -->

                        <div class="row">
                            @foreach ($houses as $house)
                                @if($house->lease_status == '已刊登')
                                    <div class="col-3 col-6-medium col-12-small">

                                        <!-- Feature -->
                                        <section class="box feature">
                                            @foreach($house->image as $image)

                                                <a href="{{ route('houses.show', $house->id) }}" class="image featured"><img
                                                        src="image/{{ $image->image }}" alt=""/></a>
                                            @endforeach
                                            <div class="col-2 text-truncate2">
                                                <h3>
                                                    <a href="{{ route('houses.show', $house->id) }}">{{ $house->county }}
                                                        |{{ $house->name }}</a>
                                                </h3>
                                            </div>
                                            <div class="col-2 text-truncate">
                                                <p>
                                                    {{ $house->introduce }}
                                                </p>
                                            </div>
                                        </section>

                                    </div>
                        @endif
                        @endforeach
                    </section>

                </div>
            </div>
        </div>
    </section>
@endsection
