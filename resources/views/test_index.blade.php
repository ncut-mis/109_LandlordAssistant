@extends('layouts.test_master')
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

        .text-truncate{
            Overflow:hidden;
            max-height: 6rem;
            line-height: 1.5rem; /*行高*/
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
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

    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row gtr-200">
                <div class="col-12">

                    <!-- Features -->
                    <section class="box features">
                        <h2 class="major"><span>你可能會喜歡....</span></h2>
                        <div>
                            <div class="row">
                                @foreach ($houses as $house)
                                    @foreach($house->image as $image)
                                <div class="col-3 col-6-medium col-12-small">

                                    <!-- Feature -->
                                    <section class="box feature">
                                        <a href="{{ route('houses.show', $house->id) }}" class="image featured"><img src="image/{{ $image->image }}" alt=""/></a>
                                        <h3><a href="{{ route('houses.show', $house->id) }}">{{ $house->name }}</a></h3>
                                        <div class="col-2 text-truncate">
                                        <p>
                                            {{ $house->introduce }}
                                        </p>
                                        </div>
                                    </section>

                                </div>
                                    @endforeach
                                @endforeach

                                <div class="col-12">
                                    <ul class="actions">
                                        <li><a href="#" class="button large">Do Something</a></li>
                                        <li><a href="#" class="button alt large">Think About It</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                <div class="col-12">

                    <!-- Highlight -->
                    <section class="box highlight">
                        <ul class="special">
                            <li><a href="#" class="icon solid fa-search"><span class="label">Magnifier</span></a></li>
                            <li><a href="#" class="icon solid fa-tablet-alt"><span class="label">Tablet</span></a></li>
                            <li><a href="#" class="icon solid fa-flask"><span class="label">Flask</span></a></li>
                            <li><a href="#" class="icon solid fa-cog"><span class="label">Cog?</span></a></li>
                        </ul>
                        <header>
                            <h2>A random assortment of icons in circles</h2>
                            <p>And some text that attempts to explain their significance</p>
                        </header>
                        <p>
                            Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper mod
                            quis
                            eget mi. Etiam eu<br/>
                            ante risus. Aliquam erat volutpat. Aliquam luctus et mattis lectus amet pulvinar. Nam nec
                            turpis
                            consequat.
                        </p>
                    </section>

                </div>


                </div>

            </div>
        </div>
    </section>
@endsection
