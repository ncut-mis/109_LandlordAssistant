@extends('layouts.test_master')
@section('title', '個人資料')
@section('content')
    <section id="main">
        <div class="container">
            <div class="row gtr-200">
                <div class="col-12">
                    <h2 class="major"><span>個人資料</span></h2>
                    <div class="card-container">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('image/_1680601358.png') }}" alt="Image">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">Card Title</h3>
                                <p class="card-text">Card description goes here.</p>
                                <a href="#" class="card-link">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
