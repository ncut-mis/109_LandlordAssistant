@extends('layouts.renter_master_index')
@section('title', '房東管理頁面-房屋詳細資訊')
@section('page-content')
    <style>
        .text {
            font-size: 18px;
            white-space: pre-wrap;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: rgba(105, 108, 255, .85);
            margin: auto;
            padding: 35px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            text-align: center;
            box-shadow: rgba(105, 108, 255, .4);
        }

        .card p {
            font-size: 18px;
            margin-top: 10px;
            margin-left: 1rem;
            text-align: left;
        }

        .replies p {
            font-size: 18px;
            margin-top: 10px;
            margin-right: 1rem;
            text-align: right;
        }


    </style>
    @if(session('success'))
        <div class="mx-3 my-3">
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="mx-3 my-3">
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @php
        $expense = session('expense');
        $signatory = session('signatory');
    @endphp
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /</span>詳細資訊</h4>
                        <a class="btn btn-outline-secondary"
                           href="{{ route('owners.locations.houses.show',[$house->owner_id, $location_id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd"
                                      d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                        </a>
                        <!-- Tabs -->
                        <h3 class="py-3 my-1 fw-semibold">{{ $house->name }}</h3>
                        <div class="row">
                            <div class="col-xl-15">
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs  me-auto mb-2 mb-lg-0" role="tablist">
                                        <li class="nav-item">
                                            <button type="button"
                                                    class="nav-link @if(isset($expense) || isset($signatory)) @else active @endif" role="tab"
                                                    data-bs-toggle="tab" data-bs-target="#navs-top-house"
                                                    aria-controls="navs-top-home" aria-selected="true">房屋資訊
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link @if($expense == '1') active @endif"
                                                    role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-top-expense" aria-controls="navs-top-messages"
                                                    aria-selected="false">費用
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-top-repair" aria-controls="navs-top-home"
                                                    aria-selected="false">報修
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link @if($signatory == '1') active @endif" role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-top-renter" aria-controls="navs-top-messages"
                                                    aria-selected="false">租客資訊
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!--房屋資訊內容-->
                                        <div class="tab-pane fade @if(isset($expense) || isset($signatory)) @else active show @endif"
                                             id="navs-top-house" role="tabpanel">


                                            <div class="container-xxl flex-grow-1 container-p-y">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8 order-0 mb-4">
                                                        <div class="card">
                                                            <div class="row row-bordered g-0">
                                                                <div class="col-md-8">
                                                                    <h5 class="card-header m-0 me-2 pb-3">圖片</h5>
                                                                    <div id="totalRevenueChart" class="px-2"
                                                                         style="min-height: 315px;">
                                                                        @foreach($house->image as $image)
                                                                            <img
                                                                                src="{{ asset('image/'.$image->image) }}"
                                                                                alt="123" class="img-fluid">
                                                                        @endforeach
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div
                                                                        class="card-header d-flex align-items-center justify-content-between">
                                                                        <h5 class="card-title m-0 me-2">目前租客</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <ul class="p-0 m-0">

                                                                            @if(!$renters_data->isEmpty())
                                                                                @foreach($renters_data as $abc)
                                                                                    <li class="d-flex mb-4 pb-1">
                                                                                        <div
                                                                                            class="avatar flex-shrink-0 me-3">
                                                                                            <img
                                                                                                src="{{ asset('assets/img/icons/unicons/paypal.png') }}"
                                                                                                alt="User"
                                                                                                class="rounded">
                                                                                        </div>
                                                                                        <div
                                                                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                            <div class="me-2">
                                                                                                <h5 class="mb-0 fw-semibold">{{ $abc->name }}</h5>
                                                                                                <small
                                                                                                    class="text-muted d-block mb-0">電話：{{ $abc->phone }}</small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            @else
                                                                                <li class="d-flex mb-4 pb-1">
                                                                                    <div
                                                                                        class="avatar flex-shrink-0 me-3">
                                                                                        <img
                                                                                            src="{{ asset('assets/img/icons/unicons/paypal.png') }}"
                                                                                            alt="User" class="rounded">
                                                                                    </div>
                                                                                    <div
                                                                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                        <div class="me-2">
                                                                                            <h5 class="mb-0 fw-semibold">
                                                                                                尚無資料</h5>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 order-1">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                                                            style="position: relative;">
                                                                            <div
                                                                                class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                                                <div class="card-title">
                                                                                    <h5 class="text-nowrap fw-semibold mb-2">
                                                                                        租金</h5>
                                                                                    <span
                                                                                        class="badge bg-label-warning rounded-pill">每
                                                                                        @if( $house->interval == 12)
                                                                                            年繳
                                                                                        @elseif( $house->interval == 6)
                                                                                            半年繳
                                                                                        @elseif( $house->interval == 3)
                                                                                            季繳
                                                                                        @elseif( $house->interval == 1)
                                                                                            月繳
                                                                                        @endif一次</span>
                                                                                </div>
                                                                                <div class="mt-sm-auto">
                                                                                    <h3 class="mb-0">
                                                                                        ${{ number_format($house->rentals) }}</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div id="profileReportChart"
                                                                                 style="min-height: 80px;">

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                                                            style="position: relative;">
                                                                            <div
                                                                                class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                                                <div class="card-title overflow-hidden">
                                                                                    <h5 class="text-nowrap fw-semibold mb-2">
                                                                                        介紹</h5>
                                                                                    <p class="text">@if(!empty($house->introduce))
                                                                                            {{ $house->introduce }}
                                                                                        @elseif(empty($house->introduce))
                                                                                            尚未填寫
                                                                                        @endif</p>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Total Revenue -->
                                                    <div class="col-lg-8 mb-4  order-2 order-md-3 order-lg-2 mb-4">
                                                        <div class="card">
                                                            <div class="d-flex align-items-end row">
                                                                <div class="col-sm-7">
                                                                    <div class="card-body overflow-hidden">
                                                                        <h5 class="card-title text-primary">地址</h5>
                                                                        <p class="mb-4">
                                                                            {{ $house->county }}{{ $house->area }}{{ $house->address }}
                                                                        </p>
                                                                        <h5 class="card-title text-primary">設備</h5>
                                                                        @foreach($furnishings as $furnishings)
                                                                            <a href="#"
                                                                               class="btn btn-sm btn-outline-primary">{{ $furnishings->furnish }}</a>
                                                                        @endforeach
                                                                        <p>
                                                                        <h5 class="card-title text-primary">特色</h5>
                                                                        @foreach($features as $features)
                                                                            <a href="#"
                                                                               class="btn btn-sm btn-outline-primary">{{ $features->feature }}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 text-center text-sm-left">
                                                                    <div class="card-body pb-0 px-0 px-md-4">
                                                                        <img
                                                                            src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}"
                                                                            height="140" alt="View Badge User"
                                                                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                                            data-app-light-img="illustrations/man-with-laptop-light.png">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                                                        <div class="row">
                                                            <div class="col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <span
                                                                            class="fw-semibold d-block mb-1">可住人數</span>
                                                                        <h3 class="card-title mb-2">@if(!empty($house->num_renter))
                                                                                {{ $house->num_renter }}
                                                                            @elseif(empty($house->num_renter))
                                                                                未寫
                                                                            @endif 人</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <span
                                                                            class="fw-semibold d-block mb-1">最短租期</span>
                                                                        <h3 class="card-title text-nowrap mb-1">@if(!empty($house->min_period))
                                                                                {{ $house->min_period }}
                                                                            @elseif(empty($house->min_period))
                                                                                未寫
                                                                            @endif 個月</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <span
                                                                            class="fw-semibold d-block mb-1">坪數</span>
                                                                        <h3 class="card-title text-nowrap mb-1">@if(!empty($house->size))
                                                                                {{ $house->size }}
                                                                            @elseif(empty($house->size))
                                                                                未寫
                                                                            @endif 坪</h3>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <span
                                                                            class="fw-semibold d-block mb-1">房間</span>
                                                                        <h3 class="card-title text-nowrap mb-1">@if(!empty($house->pattern))
                                                                                {{ $house->pattern }}
                                                                            @elseif(empty($house->pattern))
                                                                                未寫
                                                                            @endif 間房</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <span
                                                                            class="fw-semibold d-block mb-1">類型</span>
                                                                        <h3 class="card-title text-nowrap mb-2">@if(!empty($house->type))
                                                                                {{ $house->type }}
                                                                            @elseif(empty($house->type))
                                                                                未寫
                                                                            @endif</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <span
                                                                            class="fw-semibold d-block mb-1">樓層</span>
                                                                        <h3 class="card-title mb-2">
                                                                            第 @if(!empty($house->floor))
                                                                                {{ $house->floor }}
                                                                            @elseif(empty($house->floor))
                                                                                未寫
                                                                            @endif 樓</h3>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- </div>
                                            <div class="row"> -->
                                                        </div>
                                                    </div>
                                                    <!--/ Total Revenue -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--費用資訊內容-->
                                        <div class="tab-pane fade @if($expense == '1') active show @endif"
                                             id="navs-top-expense" role="tabpanel">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark active"
                                                            style="margin-left: 12px"
                                                            id="pills-all-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-all"
                                                            aria-disabled="true" type="button" role="tab"
                                                            aria-controls="pills-all"
                                                            aria-selected="true">
                                                        全部
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="pills-for_rent-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-for_rent"
                                                            type="button" role="tab" aria-controls="pills-for_rent"
                                                            aria-selected="false">
                                                        水費
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="pills-listed-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-listed"
                                                            type="button" role="tab" aria-controls="pills-listed"
                                                            aria-selected="false">
                                                        電費
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="pills-vacancy-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-vacancy"
                                                            type="button" role="tab" aria-controls="pills-vacancy"
                                                            aria-selected="false">
                                                        房租
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="pills-vacancy-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-vacancy"
                                                            type="button" role="tab" aria-controls="pills-vacancy"
                                                            aria-selected="false">
                                                        其他費用
                                                    </button>
                                                </li>
                                                <li class="py-2 px-3">||</li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark"
                                                            id="pills-vacancy-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-vacancy"
                                                            type="button" role="tab" aria-controls="pills-vacancy"
                                                            aria-selected="false">
                                                        已繳費
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="pills-vacancy-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-vacancy"
                                                            type="button" role="tab" aria-controls="pills-vacancy"
                                                            aria-selected="false">
                                                        未繳費
                                                    </button>
                                                </li>
                                                <li class="py-2 px-3">||</li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="{{route('houses.expenses.create',['house' => $house->id])}}">
                                                        <button type="button" class="btn btn-primary">新增費用</button>
                                                    </a>
                                                </li>
                                                <li class="py-2 px-3">||</li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="{{route('houses.expenses_rentals.create',['house' => $house->id])}}">
                                                        <button type="button" class="btn btn-success">新增租金</button>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="card-body">
                                                <table class="table" id="datatablesSimple">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col"
                                                            style="text-align: center;width: 9%;font-size: 18px">費用開始日
                                                        </th>
                                                        <th scope="col"
                                                            style="text-align: center;width: 9%;font-size: 18px">費用結束日
                                                        </th>
                                                        <th scope="col"
                                                            style="text-align: center;width: 7%;font-size: 18px">費用類型
                                                        </th>
                                                        <th scope="col"
                                                            style="text-align: center;width: 5%;font-size: 18px">金額
                                                        </th>
                                                        <th scope="col"
                                                            style="text-align: center;width: 10%;font-size: 18px">備註
                                                        </th>
                                                        <th scope="col"
                                                            style="text-align: center;width: 7%;font-size: 18px">狀態
                                                        </th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($house->expenses as $expense)
                                                        <tr>
                                                            <td style="text-align: center">{{$expense->start_date}}</td>
                                                            <td style="text-align: center">{{$expense->end_date}}</td>
                                                            <td style="text-align: center">{{$expense->type}}</td>
                                                            <td style="text-align: center">{{$expense->amount}} 元</td>
                                                            <td style="text-align: center">{{$expense->remark}} </td>
                                                            <td style="text-align: center">
                                                                @if($expense->owner_status == 0)
                                                                    未送出費用
                                                                @elseif($expense->owner_status == 1)
                                                                    @if($expense->renter_status == 0)
                                                                        費用已送出<br>尚未繳費
                                                                    @elseif($expense->renter_status == 1)
                                                                        已繳費
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td style="text-align: right;width: 5%">
                                                                @csrf
                                                                @if($expense->owner_status == 0)
                                                                    <a class="btn btn-secondary" href="@if($expense->type == '租金'){{route('houses.expenses_rentals.edit',['expense'=>$expense -> id])}}
                                                                @else{{route('houses.expenses.edit',['expense'=>$expense -> id])}}@endif">修改</a>
                                                                @else
                                                                    <button class="btn btn-secondary" disabled>修改
                                                                    </button>
                                                                @endif
                                                                {{--                                                                <a class="btn btn-secondary" href="{{route('houses.expenses_rentals.edit',['expense'=>$expense -> id])}}">修改</a>--}}
                                                            </td>
                                                            <td style="text-align: right;width: 3%">
                                                                <form
                                                                    action="{{route('houses.expenses.destroy',$expense -> id)}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @if($expense->owner_status == 0)
                                                                        <button class="btn btn-danger"
                                                                                onclick="return confirm('確定要刪除嗎？')">
                                                                            刪除
                                                                        </button>
                                                                    @else
                                                                        <button class="btn btn-danger" disabled>刪除
                                                                        </button>
                                                                    @endif
                                                                </form>
                                                            </td>

                                                            <td style="text-align: right;width: 8%">

                                                                <form
                                                                    action="{{ route('houses.expenses.update', ['expense'=> $expense -> id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    @if($expense->owner_status == 0)
                                                                        {{--<button href="{{route('sendemail.expense',$expense -> id)}}" class="btn btn-warning" name="ownerpush1">送出費用</button>--}}
                                                                        <button type="submit" class="btn btn-warning" name="ownerpush">送出費用</button>
                                                                    @elseif($expense->owner_status == 1)
                                                                        @if($expense->renter_status == 0)
                                                                            <a href="{{route('sendemail.expense',$expense -> id)}}" class="btn btn-warning">再次提醒</a>
                                                                        @elseif($expense->renter_status == 1)
                                                                            <button type="button" class="btn btn-primary" disabled>再次提醒</button>
                                                                        @endif
                                                                    @endif
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--報修資訊內容-->
                                        <div class="tab-pane fade" id="navs-top-repair" role="tabpanel">
                                            <ul class="nav nav-house mb-3" id="house-tab" role="tablist">
                                                <!--<li class="nav-item">
                                                    <button class="btn btn-outline-dark active"
                                                            style="margin-left: 12px" id="repair-all-tab"
                                                            data-bs-toggle="tab" data-bs-target="#repair-all"
                                                            aria-expanded="true" aria-disabled="true" type="button"
                                                            role="tab" aria-controls="repair-all" aria-selected="true">
                                                        全部
                                                    </button>
                                                </li>-->
                                                <li class="nav-item">
                                                    <button class="btn btn-outline-dark active"
                                                            style="margin-left: 12px"
                                                            id="repair-not-finshed-tab" data-bs-toggle="tab"
                                                            data-bs-target="#repair-not-finshed" type="button"
                                                            role="tab" aria-controls="repair-not-finshed"
                                                            aria-selected="false">
                                                        未維修
                                                    </button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="conduct-tab" data-bs-toggle="tab"
                                                            data-bs-target="#in-repair" type="button" role="tab"
                                                            aria-controls="in-repair" aria-selected="false">
                                                        維修中
                                                    </button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                                                            id="finshed-tab" data-bs-toggle="tab"
                                                            data-bs-target="#repair-finsh" type="button" role="tab"
                                                            aria-controls="repair-finsh" aria-selected="false">
                                                        已維修
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <!--全部-->
                                                <!--未維修-->
                                                <div class="tab-pane fade active show" id="repair-not-finshed"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center;font-size: 18px">標題</th>
                                                            <th style="text-align: center;font-size: 18px">日期</th>
                                                            <th style="text-align: center;font-size: 18px">狀態</th>
                                                            <th style="text-align: center;font-size: 18px">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        @foreach($unrepair  as $repair)
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <strong>{{$repair -> title}}</strong></td>
                                                                <td style="text-align: center">{{$repair -> created_at}}</td>
                                                                <td style="text-align: center ;padding-right:5px"><span
                                                                        class="badge bg-label-primary me-1">{{$repair -> status}}</span>
                                                                </td>
                                                                <td style="text-align: center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                href="{{route('renters.houses.repairs.show',[$repair->id,$house->id])}}"
                                                                                data-target="#myModal{{$repair->id}}"
                                                                                data-toggle="modal">查看內容
                                                                        </button>
                                                                        <!--<button type="button" class="btn btn-info">查看內容</button>-->
                                                                        &emsp;<div id="myModal{{$repair -> id}}"
                                                                                   class="modal">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <!-- 訊息視窗標題 -->
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title"
                                                                                            style="color: #f0f0f0">
                                                                                            報修內容</h4>
                                                                                    </div>

                                                                                    <!-- 訊息視窗內容 -->
                                                                                    <div class="card"
                                                                                         style="margin-top: 20px; margin-bottom: 20px;">
                                                                                        <p>租客：</p>
                                                                                        <p>{{$repair->content}}</p>
                                                                                        <small>{{$repair->updated_at}}</small>
                                                                                    </div>
                                                                                    <div class="card replies"
                                                                                         style="margin-bottom: 20px;">
                                                                                        <p>房東 ：</p>
                                                                                        <p>已維修</p>
                                                                                    </div>
                                                                                    <p>
                                                                                        <!-- 訊息視窗按鈕 -->
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-danger close"
                                                                                                data-dismiss="modal"
                                                                                                onclick="closeModal('myModal{{$repair->id}}')">
                                                                                            關閉
                                                                                        </button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button"
                                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu" style="">
                                                                            <form
                                                                                action="{{route('houses.repairs.update',$repair -> id)}}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <button class="dropdown-item"
                                                                                        name="status" value="維修中"><i
                                                                                        class="bx bx-edit-alt me-1"></i>
                                                                                    維修中
                                                                                </button>
                                                                            </form>
                                                                            <form
                                                                                action="{{route('houses.repairs.update',$repair -> id)}}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <button class="dropdown-item"
                                                                                        name="status" value="已維修"><i
                                                                                        class="bx bx-edit-alt me-1"></i>
                                                                                    已維修
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--維修中-->
                                                <div class="tab-pane fade" id="in-repair"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center;font-size: 18px">標題</th>
                                                            <th style="text-align: center;font-size: 18px">日期</th>
                                                            <th style="text-align: center;font-size: 18px">狀態</th>
                                                            <th style="text-align: center;font-size: 18px">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        @foreach($inrepair  as $repair)
                                                            <tr>
                                                                <td>
                                                                    <strong>{{$repair -> title}}</strong></td>
                                                                <td style="text-align: center">{{$repair -> created_at}}</td>
                                                                <td style="text-align: center ;padding-right:5px"><span
                                                                        class="badge bg-label-primary me-1">{{$repair -> status}}</span>
                                                                </td>
                                                                <td style="text-align: center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                href="{{route('renters.houses.repairs.show',[$repair->id,$house->id])}}"
                                                                                data-target="#myModal{{$repair->id}}"
                                                                                data-toggle="modal">查看內容
                                                                        </button>
                                                                        <!--<button type="button" class="btn btn-info">查看內容</button>-->
                                                                        &emsp;<div id="myModal{{$repair -> id}}"
                                                                                   class="modal">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <!-- 訊息視窗標題 -->
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title"
                                                                                            style="color: #f0f0f0">
                                                                                            報修內容</h4>
                                                                                    </div>

                                                                                    <!-- 訊息視窗內容 -->
                                                                                    <div class="card"
                                                                                         style="margin-top: 20px; margin-bottom: 20px;">
                                                                                        <p>租客：</p>
                                                                                        <p>{{$repair->content}}</p>
                                                                                        <small>{{$repair->updated_at}}</small>
                                                                                    </div>
                                                                                    <div class="card replies"
                                                                                         style="margin-bottom: 20px;">
                                                                                        <p>房東 ：</p>
                                                                                        <p>已維修</p>
                                                                                    </div>
                                                                                    <p>
                                                                                        <!-- 訊息視窗按鈕 -->
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-danger close"
                                                                                                data-dismiss="modal"
                                                                                                onclick="closeModal('myModal{{$repair->id}}')">
                                                                                            關閉
                                                                                        </button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button"
                                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu" style="">
                                                                            <form
                                                                                action="{{route('houses.repairs.update',$repair -> id)}}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <button class="dropdown-item"
                                                                                        name="status" value="已維修"><i
                                                                                        class="bx bx-edit-alt me-1"></i>
                                                                                    已維修
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--已維修-->
                                                <div class="tab-pane fade" id="repair-finsh"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center;font-size: 18px">標題</th>
                                                            <th style="text-align: center;font-size: 18px">日期</th>
                                                            <th style="text-align: center;font-size: 18px">狀態</th>
                                                            <th style="text-align: center;font-size: 18px">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        @foreach($finsh  as $repair)
                                                            <tr>
                                                                <td>
                                                                    <strong
                                                                        style="text-align: center">{{$repair -> title}}</strong>
                                                                </td>
                                                                <td style="text-align: center">{{$repair -> created_at}}</td>
                                                                <td style="text-align: center ;padding-right:5px"><span
                                                                        class="badge bg-label-primary me-1">{{$repair -> status}}</span>
                                                                </td>
                                                                <td style="text-align: center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                href="{{route('renters.houses.repairs.show',[$repair->id,$house->id])}}"
                                                                                data-target="#myModal{{$repair->id}}"
                                                                                data-toggle="modal">查看內容
                                                                        </button>
                                                                        <!--<button type="button" class="btn btn-info">查看內容</button>-->
                                                                        &emsp;<div id="myModal{{$repair -> id}}"
                                                                                   class="modal">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <!-- 訊息視窗標題 -->
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title"
                                                                                            style="color: #f0f0f0">
                                                                                            報修內容</h4>
                                                                                    </div>

                                                                                    <!-- 訊息視窗內容 -->
                                                                                    <div class="card"
                                                                                         style="margin-top: 20px; margin-bottom: 20px;">
                                                                                        <p>租客：</p>
                                                                                        <p>{{$repair->content}}</p>
                                                                                        <small>{{$repair->updated_at}}</small>
                                                                                    </div>
                                                                                    <div class="card replies"
                                                                                         style="margin-bottom: 20px;">
                                                                                        <p>房東 ：</p>
                                                                                        <p>已維修</p>
                                                                                    </div>
                                                                                    <p>
                                                                                        <!-- 訊息視窗按鈕 -->
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-danger close"
                                                                                                data-dismiss="modal"
                                                                                                onclick="closeModal('myModal{{$repair->id}}')">
                                                                                            關閉
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade @if($signatory == '1') active show @endif" id="navs-top-renter" role="tabpanel">


                                            @if(!$renters_data->isEmpty())
                                                @foreach($renters_data as $index => $renter)

                                                    @if ($index === 0)
                                                        {{-- 檢查是否為第一次迭代 --}}
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th style="text-align: center;font-size: 18px">
                                                                    租客名稱
                                                                </th>
                                                                <th style="text-align: center;font-size: 18px">電話</th>
                                                                <th style="text-align: center;font-size: 18px"></th>
                                                            </tr>
                                                            </thead>
                                                            @endif
                                                            <tbody class="table-border-bottom-0">
                                                            <tr>
                                                                <td style="text-align: center;">{{ $renter->name }}</td>
                                                                <td style="text-align: center;">{{ $renter->phone }}</td>
                                                                <td style="text-align: center;">

                                                                    {{--                                                            <form action="{{ route('owners.houses.rts.destroy', ['signatory' => $contract[$index]->id]) }}" method="POST">--}}
                                                                    {{--                                                                @csrf--}}
                                                                    {{--                                                                @method('DELETE')--}}
                                                                    {{--                                                                <button type="submit" class="btn btn-danger">移除租客</button>--}}
                                                                    {{--                                                            </form><p></p>--}}
                                                                    {{--                                                        </td>--}}
                                                                    <form
                                                                        action="{{ route('owners.houses.rts.destroy', ['signatory' => $contract[$index]->id]) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('確定要移除租客嗎？')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">
                                                                            移除租客
                                                                        </button>
                                                                    </form>
                                                            </tr>
                                                            </tbody>
                                                            @endforeach
                                                        </table>
                                                    @else
                                                        <table class="container">
                                                            <thead>
                                                            <tr>
                                                                <th><h1>尚無租客</h1></th>
                                                            </tr>
                                                            </thead>
                                                            {{--                                                <tbody>--}}
                                                            {{--                                                <tr>--}}
                                                            {{--                                                    <td>尚無租客</td>--}}

                                                            {{--                                                </tr>--}}

                                                            {{--                                                </tbody>--}}
                                                        </table>

                                                    @endif
                                                    <br>
                                                    目前邀請碼為:
                                                    <div class="col-2 alert alert-primary" role="alert"
                                                         style="font-size: 18px">
                                                        {{ $house->invitation_code }}
                                                    </div>
                                                    <br>
                                                    將此邀請碼給予租客輸入，租客即可進入房屋。租客進入房屋後此驗證碼將會改變，刪除房屋前請先移除租客
                                                    {{--                    <a class="btn btn-danger text-center" href="{{ route('owners.houses.rts.create', $house->id) }}">變更邀請碼</a>--}}
                                        </div>


                                    </div>


                                </div>
                            </div>
                            <p></p>
                        </div>


                        <!-- Tabs -->
                        <!-- Pills -->
                        <!-- Pills -->
                        <a type="button" class="btn btn-secondary"
                           href="{{route('owners.locations.houses.show',['owner'=>$house->owner_id, 'location'=>$house->location_id])}}">返回房屋列表</a>
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script>
        var buttons = document.querySelectorAll('[data-toggle="modal"]');

        buttons.forEach(function (button) {
            var target = button.getAttribute('data-target');
            var modal = document.querySelector(target);
            button.onclick = function () {
                modal.style.display = "block";
            }
        });

        function closeModal() {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function (modal) {
                modal.style.display = "none";
            });
        }
    </script>
@endsection
