@extends('layouts.renter_master_index')
@section('title', '房東頁面-修改費用')
@section('page-content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <main>
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /詳細資訊 /</span>修改費用</h4>
                            <!-- Tabs -->
                            <form method="post" action="{{ route('houses.expenses.update',[$expenses->id]) }}">
                                @csrf
                                @method('PATCH')
                                @foreach($houses as $houses)
                                <h3 class="my-1 fw-semibold">修改 {{$houses->name}} 費用</h3>
                                @endforeach
                                <div id="floatingInputHelp" class="form-text my-3">此為一次性費用</div>
                                <div class="col-xl-8">
                                    <!-- HTML5 Inputs -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="html5-date-input" class="col-md-2 col-form-label" style="font-size: 18px">費用開始日期</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="date" name="start_date" value="{{$expenses->start_date}}">
                                                </div>
                                                <label for="html5-date-input" class="col-md-1" style="font-size: 18px"></label>
                                                <label for="html5-date-input" class="col-md-2 col-form-label" style="font-size: 18px">費用結束日期</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="date" name="end_date" value="{{$expenses->end_date}}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="defaultSelect" class="col-md-2 col-form-label" style="font-size: 20px">費用類型</label>
                                                <div class="col-md-7">
                                                    <select name="type" class="form-select ">
                                                        <option value="{{$expenses->type}}">{{$expenses->type}}</option>
{{--                                                        <option value="租金">租金</option>--}}
                                                        <option value="水費">水費</option>
                                                        <option value="電費">電費</option>
                                                        <option value="瓦斯費">瓦斯費</option>
                                                        <option value="網路費">網路費</option>
                                                        <option value="管理費">管理費</option>
                                                        <option value="車位">車位</option>
                                                        <option value="維修費">維修費</option>
                                                        <option value="其他">其他</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="mb-3 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label" style="font-size: 20px">費用金額</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="amount" value="{{$expenses->amount}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label" style="font-size: 20px">備註</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="remark" value="{{$expenses->remark}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info mx-3">更改費用</button>
                                <a type="button" class="btn btn-secondary" href="{{route('owners.houses.show',[$houses->id])}}">返回</a>
                            </form>
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
    </main>
@endsection
