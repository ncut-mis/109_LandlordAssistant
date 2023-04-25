@extends('layouts.master')
@section('title', '個人資料')
@section('content')
    <style>
        .container-1 {
            width: 70%;
            margin: 50px auto;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .name-container {
            display: flex;
            align-items: center;
        }

        .avatar img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 0px;
            margin-right: 30px;
        }

        input[type=text1] {
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 0.5em;;
            font-size: 20px;
            background-color: white;
            background-position: 10px 13px;
            background-size: 27px;
            background-repeat: no-repeat;
            padding: 2px 20px;
        }

        .btn1 {
            -webkit-appearance: none;
            display: inline-block;
            font-family: 'Open Sans Condensed', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            background: #b1ddab;
            color: #fff;
            border: 0;
            line-height: 1em;
            border-radius: 8px;
            outline: 0;
            cursor: pointer;
            -moz-transition: background-color .2s ease-in-out;
            -webkit-transition: background-color .2s ease-in-out;
            -o-transition: background-color .2s ease-in-out;
            -ms-transition: background-color .2s ease-in-out;
            transition: background-color .2s ease-in-out;
            font-size: 1.25em;
            padding: 0.85em 1.85em;
            text-align: center;
        }


    </style>

    <section id="main">
        <div class="col-12">
            <h2 class="major" style="margin: 0 50px"><span>個人資料</span></h2>

            <div class="container-1">
                <div class="main">
                    <div class="name-container">
                        <div class="avatar">
                            <img src="{{ asset('image/userimage.png') }}" alt="Image">
                        </div>
                        <div class="name">
                            <h2>{{ $users->name }}</h2>
                            <h2>{{ $users->email }}</h2>
                            <h2>{{ $users->phone }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="major" style="margin: 0 50px"><span>收付款方式</span></h2>
            <div class="container-1">
                <div class="main">
                    <div class="col">
                        <h2>銀行代碼　　</h2>
                        <h2>銀行帳號　　</h2>
                    </div>
                    <br>
                    <div class="col">
                        <h2>{{ $users->account_name }}</h2>
                        <h2>{{ $users->account }}</h2>
                    </div>
                </div>
                <div class="main">
                    <a class="btn1" href="{{ route('users.edit',$users->id) }}">修改</a>
                </div>

            </div>

        </div>


    </section>
@endsection
