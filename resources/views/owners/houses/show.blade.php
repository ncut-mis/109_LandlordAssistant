
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        fetch('/upload', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // 上傳成功，顯示成功訊息
                    alert(data.message);
                } else {
                    // 上傳失敗，顯示錯誤訊息
                    alert('上傳失敗：' + data.message);
                }
            })
            .catch(error => console.error(error));
        function scrollToTop() {
            // 滾動到頁面頂部
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        $(function(){
            $('.masonry').masonry({
                itemSelector: '.item'
            })});

    </script>
    <style>
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 10px;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 50%;
            transition: all .3s ease-in-out;
        }

        .scroll-to-top:hover {
            background-color: #eee;
            cursor: pointer;
        }

        .scroll-to-top i {
            font-size: 20px;
            color: #333;
        }



    </style>

    {{-- 回到最上面的按鈕 --}}
    <button onclick="scrollToTop()" class="scroll-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <form method="POST" action="">
        @csrf
        @method('PATCH')
        <div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
            <div class="location" style="padding: 20px;border: 1px solid #ccc;width:1200px">
                <div class="house row_create_house" style="padding: 20px;border: 1px solid #ccc;">
                    <a class="btn btn-outline-secondary text-center" href="{{ route('owners.locations.houses.show',[$house->owner_id, $location_id]) }}">返回</a>
                    <div class="row">
                        <div class="column" style="width:50%;text-align:right">
                            <ul class="nav nav-home mb-3" id="home-tab" role="tablist">
                                <li class="nav-item" role="presentation">

                                    <button class="btn btn-outline-dark active" style="margin-left: 12px"
                                            id="home-tab" data-bs-toggle="tab" data-bs-target="#home" aria-expanded="true"
                                            aria-disabled="true" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">
                                        房屋資訊
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="home-contract-tab" data-bs-toggle="tab" data-bs-target="#home-contract"
                                            type="button" role="tab" aria-controls="home-contract" aria-selected="false">
                                        合約
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="home-pack-tab" data-bs-toggle="tab" data-bs-target="#home-pack"
                                            type="button" role="tab" aria-controls="home-pack" aria-selected="false">
                                        信件
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="home-expense-tab" data-bs-toggle="tab" data-bs-target="#home-expense"
                                            type="button" role="tab" aria-controls="home-expense" aria-selected="false">
                                        費用
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="home-repair-tab" data-bs-toggle="tab" data-bs-target="#home-repair"
                                            type="button" role="tab" aria-controls="home-repair" aria-selected="false">
                                        報修
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="home-code-tab" data-bs-toggle="tab" data-bs-target="#home-code"
                                            type="button" role="tab" aria-controls="home-code" aria-selected="false">
                                        租客資訊
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <!--房屋資訊-->
                    <div class="tab-pane show active fade" id="home" role="tabpanel" aria-labelledby="home-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                        <div class="container" style="overflow-y: auto;padding: 20px;">
                            <div class="row" style="white-space: nowrap;">
                                <div class="col-md-3 item" style="margin-right: 5px;">
                                    @foreach($house->image as $image)
                                        <img src="{{ asset('image/'.$image->image) }}" alt="123" class="img-fluid">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <header class="bg-dark py-5">
                            <div class="container my-5">
                                <div class="row bg-dark text-white py-2 mx-1">
                                    <div class="col-8 fw-bold">
                                        <div class="row bg-dark text-white py-2" style="font-size: 3rem;">
                                            房屋名稱：{{ $house->name }}
                                            <hr class="text-white-80">
                                        </div>
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-2">
                                                地址：
                                            </div>
                                            <div class="col">
                                                {{ $house->county }}{{ $house->area }}{{ $house->address }}
                                            </div>
                                        </div>
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-2">
                                                介紹：
                                            </div>
                                            <div class="col-9">
                                                @if(!empty($house->introduce)){{ $house->introduce }}@elseif(empty($house->introduce))尚未填寫 @endif
                                            </div>
                                        </div>
                                        {{--以下內容待修改--}}

                                        <div class="row bg-dark text-white py-2">
                                            <div class="fs-4" style="white-space: nowrap;">
                                                <div class="fs-4">
                                                    <div class="col-2">
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
                                                        <span class="text-danger">{{ number_format($expenses->value('amount')) }}</span>　元　　
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-6">
                                                可住　@if(!empty($house->num_renter)){{ $house->num_renter }}@elseif(empty($house->num_renter))尚未填寫 @endif人
                                            </div>
                                            <div class="col-6">
                                                最短租　@if(!empty($house->min_period)){{ $house->min_period }}@elseif(empty($house->min_period))尚未填寫 @endif個月
                                            </div>
                                        </div>
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-6">
                                                房間　@if(!empty($house->pattern)){{ $house->pattern }}@elseif(empty($house->pattern))尚未填寫 @endif　間
                                            </div>
                                            <div class="col-6">
                                                房間　@if(!empty($house->size)){{ $house->size }}@elseif(empty($house->size))尚未填寫 @endif坪
                                            </div>
                                        </div>
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-6">
                                                類型：　@if(!empty($house->type)){{ $house->type }}　@elseif(empty($house->type))尚未填寫 @endif
                                            </div>
                                            <div class="col-6">
                                                第　@if(!empty($house->floor)){{ $house->floor }}@elseif(empty($house->floor))尚未填寫 @endif層
                                            </div>
                                        </div>
                                        <hr class="text-white-50">
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-9" style="white-space: nowrap;">
                                                設備<p>
                                                    @foreach($furnishings as $furnishings)
                                                        <button type="button" class="btn btn-outline-light btn-sm">{{ $furnishings->furnish }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row bg-dark text-white py-2">
                                            <div class="col-9" style="white-space: nowrap;">
                                                特色<p>
                                                    @foreach($features as $features)
                                                        <button type="button" class="btn btn-outline-light btn-sm">{{ $features->feature }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <style>




                                        .container td {
                                            font-weight: normal;
                                            font-size: 1em;
                                            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
                                            -moz-box-shadow: 0 2px 2px -2px #0E1119;
                                            box-shadow: 0 2px 2px -2px #0E1119;
                                        }



                                        .container td, .container th {
                                            padding-bottom: 2%;
                                            padding-top: 2%;
                                            padding-left:2%;
                                        }

                                        /* Background-color of the odd rows */
                                        .container tr:nth-child(odd) {
                                            background-color: #323C50;
                                        }

                                        /* Background-color of the even rows */
                                        .container tr:nth-child(even) {
                                            background-color: #2C3446;
                                        }
                                        h1 {
                                            font-size:3em;
                                            font-weight: 300;
                                            line-height:1em;
                                            text-align: center;
                                            color: #4DC3FA;
                                        }
                                        body {
                                            font-family: 'Open Sans', sans-serif;
                                            font-weight: 300;
                                            line-height: 1.42em;
                                            color:#A7A1AE;
                                            text-align: center;

                                        }
                                        .container th {
                                            background-color: #1F2739;
                                        }

                                        .container td:first-child { color: #FB667A; }

                                        .container tr:hover {
                                            background-color: #464A52;
                                            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
                                            -moz-box-shadow: 0 6px 6px -6px #0E1119;
                                            box-shadow: 0 6px 6px -6px #0E1119;
                                        }

                                        .container td:hover {
                                            background-color: #FFF842;
                                            color: #403E10;
                                            font-weight: bold;

                                            box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
                                            transform: translate3d(6px, -6px, 0);

                                            transition-delay: 0s;
                                            transition-duration: 0.4s;
                                            transition-property: all;
                                            transition-timing-function: line;
                                        }

                                        @media (max-width: 800px) {
                                            .container td:nth-child(4),
                                            .container th:nth-child(4) { display: none; }
                                        }

                                    </style>
                                    <div class="col-4 fw-bold" style="padding: 20px;border: 1px solid #ccc;">
                                        <div class="row bg-dark py-2 mx-1 text-white fs-3">
                                            <div class="col fw-bold">
                                                租客姓名
                                            </div>
                                            <div class="col fw-bold">
                                                聯絡方式
                                            </div>
                                            <hr class="text-white-50">
                                        </div>
                                        @if(!$renters_data->empty())
                                            @foreach($renters_data as $renters_data)
                                                <div class="row bg-dark py-2 mx-1 text-white">
                                                    <div class="col fw-bold">
                                                        {{ $renters_data->name }}<hr>
                                                    </div>
                                                    <div class="col fw-bold">
                                                        {{ $renters_data->phone }}<hr>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row bg-dark py-2 mx-1 text-white">
                                                尚無資料
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </header>
                    </div>

                    <!--合約-->
                    <div class="tab-pane fade" id="home-contract" role="tabpanel" aria-labelledby="home-contract-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                        <a class="btn btn-danger text-center" href="{{ route('houses.contracts.create', $house->id) }}">上傳合約</a>
                        @php
                            $a=0;
                        @endphp
                        @foreach($contract as $contract)

                            <a href="{{asset('contracts/'.$contract->path)}}" target='_blank'>預覽合約{{$a+=1}}</a>

                        @endforeach

                    </div>

                    <!--信件-->
                    <div class="tab-pane fade" id="home-pack" role="tabpanel" aria-labelledby="home-pack-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                        2225
                    </div>

                    <!--費用-->
                    <div class="tab-pane fade" id="home-expense" role="tabpanel" aria-labelledby="home-expense-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                        <div class="from-group">
                            <div class="left-column" style="width:90%;padding: 20px;"><h4>{{$house->name}}費用</h4></div>
                        </div>
                        <div class="house" style="padding: 20px;border: 1px solid #ccc;">
                            {{--    vv費用種類按鈕vv    --}}
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark active" style="margin-left: 12px"
                                            id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                                            aria-disabled="true" type="button" role="tab" aria-controls="pills-all"
                                            aria-selected="true">
                                        全部
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="pills-for_rent-tab" data-bs-toggle="pill" data-bs-target="#pills-for_rent"
                                            type="button" role="tab" aria-controls="pills-for_rent" aria-selected="false">
                                        水費
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="pills-listed-tab" data-bs-toggle="pill" data-bs-target="#pills-listed"
                                            type="button" role="tab" aria-controls="pills-listed" aria-selected="false">
                                        電費
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                                            type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                                        房租
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                                            type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                                        其他費用
                                    </button>
                                </li>
                                <li class="py-2 px-3">||</li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark"
                                            id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                                            type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                                        已繳費
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                            id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                                            type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                                        未繳費
                                    </button>
                                </li>
                                <li class="py-2 px-3">||</li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{route('houses.expenses.create',['house' => $house->id])}}"><button type="button" class="btn btn-primary">新增費用</button></a>
                                </li>
                            </ul>
                            {{--    ^^費用種類按鈕^^    --}}
                    </div>

                                <div class="card-body">
                                    <table class="table" id="datatablesSimple">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;width: 10%">期間</th>
                                            <th scope="col" style="text-align: center;width: 10%">費用類型</th>
                                            <th scope="col" style="text-align: center;width: 10%">金額</th>
                                            <th scope="col" style="text-align: center;width: 10%">狀態</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($house->expenses as $expense)
                                                <tr>
                                                    <td style="text-align: center">每 {{$expense->interval}} 個月繳交</td>
                                                    <td style="text-align: center">{{$expense->type}}</td>
                                                    <td style="text-align: center">{{$expense->amount}} 元</td>
                                                    <td style="text-align: center">還要關聯應繳款項</td>
                                                    <td style="text-align: right;width: 5%">
                                                        @csrf
                                                        <a class="btn btn-secondary" href="{{route('houses.expenses.edit',['expense'=>$expense -> id])}}">修改</a>
                                                    </td>
                                                    <td style="text-align: right;width: 3%">
                                                        <form action="{{route('houses.expenses.destroy',$expense -> id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">刪除</button>
                                                        </form></td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    <!--報修-->
                    <div class="tab-pane fade" id="home-repair" role="tabpanel" aria-labelledby="home-repair-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                        444
                    </div>

                    <!--租客資料-->
                    <div class="tab-pane fade" id="home-code" role="tabpanel" aria-labelledby="home-code-tab"
                         style="padding: 20px;border: 1px solid #ccc;">

                        @if(!$renters_data->isEmpty())

                            @foreach($renters_data as $renters_data)
                                <table class="container">
                                    <thead>
                                    <tr>
                                        <th><h1>租客名稱</h1></th>
                                        <th><h1>電話</h1></th>
                                        <th><h1>行動</h1></th>
                                    </tr>
                                    </thead>

                            <tbody>
                            <tr>
                                <td>{{ $renters_data->name }}</td>
                                <td>{{ $renters_data->phone }}</td>
                                <td>

                                    <form action="{{ route('owners.houses.rts.destroy', ['signatory' => $contract->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">移除租客</button>
                                    </form>

                                </td>
                            </tr>



                            </tbody>
                        </table>
                            @endforeach
                        @else
                            <table class="container">
                                <thead>
                                <tr>
                                    <th><h1>租客名稱</h1></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>尚無租客</td>

                                </tr>

                                </tbody>
                            </table>




                        @endif
                        <br>
                        目前邀請碼為:
                        <div class="alert alert-primary" role="alert">
                            {{ $house->invitation_code }}
                        </div>
                        <br>
                        將此邀請碼給予租客輸入，租客即可進入房屋，租客進入房屋後此驗證碼會改變
                        {{--                    <a class="btn btn-danger text-center" href="{{ route('owners.houses.rts.create', $house->id) }}">變更邀請碼</a>--}}
                    </div>

                </div>
            </div>
        </div>
    </form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
@endsection
