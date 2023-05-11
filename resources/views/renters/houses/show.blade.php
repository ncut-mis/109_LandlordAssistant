@extends('layouts.renter_master_index')
@section('title', '租客頁面-房屋詳細資訊')
@section('page-content')
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
                        <!-- Tabs -->
                        <h3 class="py-3 my-1 fw-semibold">{{ $house->name }}</h3>
                        <div class="row">
                            <div class="col-xl-15">
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs  me-auto mb-2 mb-lg-0" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                    data-bs-toggle="tab" data-bs-target="#navs-top-house"
                                                    aria-controls="navs-top-home" aria-selected="true">房屋資訊
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-top-post" aria-controls="navs-top-profile"
                                                    aria-selected="false">公告
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
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
                                    </ul>
                                    <div class="tab-content">
                                        <!--房屋資訊內容-->
                                        <div class="tab-pane fade active show" id="navs-top-house" role="tabpanel">


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
                                                                    <div class="resize-triggers">
                                                                        <div class="expand-trigger"></div>
                                                                        <div class="contract-trigger"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div
                                                                        class="card-header d-flex align-items-center justify-content-between">
                                                                        <h5 class="card-title m-0 me-2">目前租客</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <ul class="p-0 m-0">
                                                                            @if(!$owners_data->empty())
                                                                                @foreach($owners_data as $owners_data)
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
                                                                                                <h5 class="mb-0 fw-semibold">{{ $owners_data->name }}</h5>
                                                                                                <small
                                                                                                    class="text-muted d-block mb-0">電話：{{ $owners_data->phone }}</small>
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
                                                                                        class="badge bg-label-warning rounded-pill">
                                                        每@if( $expenses->value('interval') == 12)
                                                                                            年繳
                                                                                        @elseif( $expenses->value('interval') == 6)
                                                                                            半年繳
                                                                                        @elseif( $expenses->value('interval') == 3)
                                                                                            季繳
                                                                                        @elseif( $expenses->value('interval') == 1)
                                                                                            月繳
                                                                                        @endif一次</span>
                                                                                </div>
                                                                                <div class="mt-sm-auto">
                                                                                    <h3 class="mb-0">
                                                                                        ${{ number_format($expenses->value('amount')) }}</h3>
                                                                                </div>
                                                                            </div>

                                                                            <div class="resize-triggers">
                                                                                <div class="expand-trigger">
                                                                                    <div
                                                                                        style="width: 474px; height: 116px;"></div>
                                                                                </div>
                                                                                <div class="contract-trigger"></div>
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
                                                                                    <p>@if(!empty($house->introduce))
                                                                                            {{ $house->introduce }}
                                                                                        @elseif(empty($house->introduce))
                                                                                            尚未填寫
                                                                                        @endif</p>
                                                                                </div>
                                                                            </div>
                                                                            <div id="profileReportChart"
                                                                                 style="min-height: 80px;">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Total Revenue -->
                                                    <!--房屋資訊-->
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
                                                <div class="row">
                                                    <!-- Order Statistics -->
                                                    <!--/ Order Statistics -->
                                                    <!-- Expense Overview -->
                                                    <!--/ Expense Overview -->
                                                    <!-- Transactions -->
                                                    <!--/ Transactions -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--公告資訊內容-->
                                        <div class="tab-pane fade" id="navs-top-post" role="tabpanel">
                                            <p>
                                                Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer
                                                candy oat cake ice cream. Gummies
                                                halvah
                                                tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                                                cheesecake fruitcake.
                                            </p>
                                            <p class="mb-0">
                                                Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin
                                                pie tiramisu halvah cotton candy
                                                liquorice caramels.
                                            </p>
                                        </div>
                                        <!--費用資訊內容-->
                                        <div class="tab-pane fade" id="navs-top-expense" role="tabpanel">
                                            <!--費用類型-->
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
                                                        @if($expense->owner_status == 1)
                                                            <tr>
                                                                <td style="text-align: center">{{$expense->start_date}}</td>
                                                                <td style="text-align: center">{{$expense->end_date}}</td>
                                                                <td style="text-align: center">{{$expense->type}}</td>
                                                                <td style="text-align: center">{{$expense->amount}} 元</td>
                                                                <td style="text-align: center">{{$expense->remark}} </td>
                                                                <td style="text-align: center">
                                                                    @if($expense->renter_status == 0)
                                                                        未繳費
                                                                    @else
                                                                        已繳費
                                                                    @endif
                                                                </td>
                                                                <td style="text-align: right;width: 5%">
                                                                    @if($expense->renter_status == 0)
                                                                        <a class="btn btn-primary" href=#>繳費</a>
                                                                    @else
                                                                        <button class="btn btn-primary" disabled>繳費</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!--報修資訊內容-->
                                        <div class="tab-pane fade active show" id="navs-top-repair" role="tabpanel">
                                            <ul class="nav nav-house mb-3" id="house-tab" role="tablist">
                                                <li class="nav-item">
                                                    <button class="btn btn-outline-dark active"
                                                            style="margin-left: 12px" id="repair-all-tab"
                                                            data-bs-toggle="tab" data-bs-target="#repair-all"
                                                            aria-expanded="true" aria-disabled="true" type="button"
                                                            role="tab" aria-controls="repair-all" aria-selected="true">
                                                        全部
                                                    </button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="btn btn-outline-dark" style="margin-left: 12px"
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
                                                <li class="py-2 px-3">||</li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="{{route('renters.houses.repairs.create',['house'=>$house->id])}}"><button type="button" class="btn btn-primary">建立報修</button></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <!--全部-->
                                                <div class="tab-pane fade active show" id="repair-all"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>內容</th>
                                                            <th style="text-align: center">日期</th>
                                                            <th style="text-align: right">狀態</th>
                                                            <th style="text-align: right">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            @foreach($house -> repairs as $repair)
                                                        <tr>
                                                            <td>
                                                                <strong>{{$repair -> content}}</strong></td>
                                                            <td style="text-align: center">{{$repair -> created_at}}</td>
                                                            <td style="text-align: right ;padding-right:5px"><span class="badge bg-label-primary me-1">{{$repair -> status}}</span>
                                                            </td>
                                                            <td style="text-align: right">
                                                                <div class="dropdown">
                                                                    <!--<button type="button" class="btn btn-info">查看內容</button>-->
                                                                    &emsp;
                                                                    <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <form action="{{route('renters.houses.repairs.edit',[$repair -> id,$house->id])}}"
                                                                              method="GET">
                                                                            @csrf
                                                                        <button class="dropdown-item"><i
                                                                                class="bx bx-edit-alt me-1"></i>
                                                                            編輯</button>
                                                                        </form>
                                                                        <form action="{{route('renters.houses.repairs.destroy',$repair -> id)}}"
                                                                              method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        <button class="dropdown-item"><i
                                                                                class="bx bx-trash me-1"></i>刪除</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--未維修-->
                                                <div class="tab-pane fade" id="repair-not-finshed"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>標題</th>
                                                            <th>日期</th>
                                                            <th>狀態</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        <tr>
                                                            <td>
                                                                <strong>標題</strong></td>
                                                            <td>日期</td>
                                                            <td><span class="badge bg-label-primary me-1">狀態</span>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i>
                                                                            編輯</a>
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i>刪除</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--維修中-->
                                                <div class="tab-pane fade" id="in-repair"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>標題</th>
                                                            <th>日期</th>
                                                            <th>狀態</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        <tr>
                                                            <td>
                                                                <strong>標題</strong></td>
                                                            <td>日期</td>
                                                            <td><span class="badge bg-label-primary me-1">狀態</span>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i>
                                                                            編輯</a>
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i>刪除</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--已維修-->
                                                <div class="tab-pane fade" id="repair-finsh"
                                                     role="tabpanel">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>標題</th>
                                                            <th>日期</th>
                                                            <th>狀態</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        <tr>
                                                            <td>
                                                                <strong>標題</strong></td>
                                                            <td>日期</td>
                                                            <td><span class="badge bg-label-primary me-1">狀態</span>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i>
                                                                            編輯</a>
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i>刪除</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!-- Tabs -->
                        <!-- Pills -->
                        <!-- Pills -->
                        <a type="button" class="btn btn-secondary" href="{{url('renters/houses')}}">返回房屋列表</a>
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
@endsection
