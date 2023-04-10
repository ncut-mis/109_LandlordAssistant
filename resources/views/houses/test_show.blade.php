@extends('layouts.test_master')
@section('title', '房間介紹')
@section('content')
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
                                            <h3>{{ $house->address }}</h3>
                                            <h2><a style="font-size: xxx-large; color: #b02a37">${{ number_format($expenses->value('amount')) }}</a>/月</h2>
                                            <ul class="meta">
                                                <li class="icon fa-clock">上架日期</li>
                                                <li class="icon fa-comments">看過的人數</li>
                                            </ul>
                                        </header>
                                        @foreach($house->image as $image)
                                            <a href="#" class="image featured"><img
                                                    src="{{ asset('image/'.$image->image) }}" alt=""/></a>
                                        @endforeach
                                        <p>
                                            {{ $house->introduce }}
                                        </p>
                                        <a href="#" class="button">Continue Reading</a>
                                    </article>

                                </div>
                            </div>
                            <div class="col-3 col-12-medium">
                                <div class="sidebar">

                                    <!-- Archives -->
                                    <ul class="divided">
                                        <li>
                                            <article class="box post-summary">
                                                <h2>繳費方式</h2>
                                                <div class="fs-6">
                                                    每
                                                    @if( $expenses->value('interval') == 12)
                                                        年繳
                                                    @elseif( $expenses->value('interval') == 6)
                                                        半年繳
                                                    @elseif( $expenses->value('interval') == 3)
                                                        季繳
                                                    @elseif( $expenses->value('interval') == 1)
                                                        月繳
                                                    @endif
                                                    一次　
                                                </div>
                                            </article>
                                        </li>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">Another Subheading</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock">9 hours ago</li>
                                                    <li class="icon fa-comments"><a href="#">27</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">And Another</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock">Yesterday</li>
                                                    <li class="icon fa-comments"><a href="#">184</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">And Another</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock">2 days ago</li>
                                                    <li class="icon fa-comments"><a href="#">286</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">And One More</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock">3 days ago</li>
                                                    <li class="icon fa-comments"><a href="#">8,086</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                    </ul>
                                    <a href="#" class="button alt">Archives</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
@endsection
