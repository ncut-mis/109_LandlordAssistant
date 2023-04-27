@extends('layouts.renter_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '租客頁面')
@section('page-content')
@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif
@if (session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
<div class="from-group mb-3 px-3 py-2">
    <div class="house" style="padding: 20px;border: 1px solid #ccc;">
        <label for="content" class="form-label"><h3>地點</h3></label>
        <div>
            填寫邀請碼加入房屋<br>
            <form action="{{ route('owners.houses.rts.store') }}" method="POST">
                @csrf
                <input placeholder="填寫邀請碼" name="invite_code" value="">
                <button class="custom-btn btn-12" type="submit"><span>確定送出</span><span>送出</span></button>

            </form>
            <br>

<div class="house" style="padding: 20px;border: 1px solid #ccc;">
    <ul class="nav nav-house mb-3" id="house-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="btn btn-outline-dark active" style="margin-left: 12px"
                    id="house-all-tab" data-bs-toggle="tab" data-bs-target="#house-all" aria-expanded="true"
                    aria-disabled="true" type="button" role="tab" aria-controls="house-all"
                    aria-selected="true">
                全部
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane show active fade" id="house-all" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-all-tab">
            @foreach ($locations as $key =>$location)
                @if($key >= 1)
                    <hr>
                @endif
                <div class="row">
                    <div class="left-column" style="width:90%;padding: 20px;">
                        <h2 style="display: inline;">{{ $location->name }}　</h2>
                        <span class="translate-middle badge rounded-pill bg-secondary" style="transform: translate(-50%, -50%);">{{ count($location->houses) }}間</span>
                        <a class="btn btn-primary" href="{{ route('renters.locations.houses.index',[$location->id]) }}">進入地點</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
