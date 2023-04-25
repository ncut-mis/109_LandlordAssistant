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
            <form method="post" action="{{ route('users.update',[$users->id])}}">
                @csrf
                @method('PATCH')
                <div class="container-1">
                    <div class="main">
                        <div class="name-container">
                            <div class="avatar">
                                <img src="{{ asset('image/userimage.png') }}" alt="Image">
                            </div>
                            <div class="name">
                                <input type="text1" style="width: 300px" value="{{ $users->name }}" name="name"
                                       placeholder="請輸入姓名"><br><br>
                                <input type="text1" style="width: 500px" value="{{ $users->email }}" name="email"
                                       placeholder="請輸入信箱"><br><br>
                                <input type="text1" style="width: 300px" value="{{ $users->phone }}" name="phone"
                                       placeholder="請輸入手機號碼"><br><br>
                            </div>
                        </div>
                    </div>
                </div>


                <h2 class="major" style="margin: 0 50px"><span>收付款方式</span></h2>
                <div class="container-1">
                    <div class="main">
                        <div class="col">
                            <div class="row">
                                <h2>銀行代碼　　</h2>
                                <input type="text1" style="width: 100px;height: 42px" value="{{ $users->account_name }}"
                                       name="account_name" placeholder="請輸入銀行代碼">
                            </div>
                            <br>
                            <div class="row">
                                <h2>銀行帳號　　</h2>
                                <input type="text1" style="width: 300px;height: 42px" value="{{ $users->account }}"
                                       name="account" placeholder="請輸入銀行帳號">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="main">
                        <button type="submit">修改</button>
                        <a class="btn1" style="margin: 10px" href="{{ route('users.index',$users->id) }}">取消</a>
                    </div>

                </div>
            </form>
        </div>


    </section>
@endsection
