@extends('layouts.renter_master_index')
@section('title', '房東頁面-新增費用')
@section('page-content')
            <div class="layout-wrapper layout-content-navbar  ">
            <div class="layout-container">
                <div class="layout-page">
                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @if(isset($success))
                                <div class="mx-1 my-1">
                                    <div class="alert alert-success" role="alert">
                                        {{ $success }}
                                    </div>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="mx-1 my-1">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /詳細資訊 /</span>新增費用</h4>

                            <form id="expense-form" method="post" action="{{ route('houses.expenses.store',['house' => $houses->id]) }}">
                                @csrf
                                <h3 class="my-1 fw-semibold">新增 {{$houses->name}} 費用</h3>
                                <div id="floatingInputHelp" class="form-text my-3">此為一次性費用</div>
                                <div class="col-xl-8">
                                    <!-- HTML5 Inputs -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="html5-date-input" class="col-md-2 col-form-label" style="font-size: 18px">費用開始日期</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}">
                                                </div>
                                                <label for="html5-date-input" class="col-md-1" style="font-size: 18px"></label>
                                                <label for="html5-date-input" class="col-md-2 col-form-label" style="font-size: 18px">費用結束日期</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="defaultSelect" class="col-md-2 col-form-label" style="font-size: 20px">費用類型</label>
                                                <div class="col-md-7">
                                                    <select name="type" class="form-select">
                                                        <option value="{{ old('type') }}">{{ old('type') }}</option>
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
                                                    <input class="form-control" type="text" name="amount">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label" style="font-size: 20px">備註</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="remark">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mx-3">新增費用</button>
                                <button type="submit" id="save-and-add" class="btn btn-info" name="store-and-next">儲存並新增下一筆</button>

                                <a type="button" class="btn btn-secondary mx-3" href="{{route('owners.houses.show',[$houses->id])}}">返回</a>
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
@endsection
