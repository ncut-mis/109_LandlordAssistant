@extends('layouts.renter_master_index')
@section('title', '房東頁面-新增租金')
@section('page-content')
    <script>
        //自動計算租金期間
        function calculateEndDate() {
            // 獲取開始日期
            var startDate = new Date(document.querySelector('input[name="start_date"]').value);

            // 獲取租金期間（假設期間單位為月）
            var interval = parseInt(document.querySelector('input[name="interval"]').value);

            // 計算結束日期
            var endDate = new Date(startDate.getTime());
            endDate.setMonth(endDate.getMonth() + interval);

            // 設定結束日期的value值
            document.querySelector('input[name="end_date"]').value = endDate.toISOString().slice(0, 10);
        }
        function calculateStarDate() {
            // 獲取結束日期
            var endDate = new Date(document.querySelector('input[name="end_date"]').value);

            // 獲取租金期間（假設期間單位為月）
            var interval = parseInt(document.querySelector('input[name="interval"]').value);

            // 計算開始日期
            var startDate = new Date(endDate.getTime());
            startDate.setMonth(startDate.getMonth() - interval);

            // 設定開始日期的value值
            document.querySelector('input[name="start_date"]').value = startDate.toISOString().slice(0, 10);
        }

        function calculateAmount() {
            const rentals = parseFloat(document.querySelector('input[name="rentals"]').value);
            const interval = parseInt(document.querySelector('input[name="interval"]').value);
            const amount = rentals * interval;
            document.querySelector('input[name="amount"]').value = amount;
        }

        document.querySelector('input[name="interval"]').addEventListener('change', calculateAmount);
    </script>

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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /詳細資訊 /</span>新增租金</h4>
                            <!-- Tabs -->
                            <form method="post" action="{{ route('houses.expenses_rentals.store',['house' => $houses->id]) }}">
                                @csrf
                                <h3 class="my-1 fw-semibold">新增 {{$houses->name}} 費用</h3>
                                <div id="floatingInputHelp" class="form-text my-3">此為一次性費用</div>
                                <div class="col-xl-8">
                                    <!-- HTML5 Inputs -->
                                    <div class="card mb-4">
                                        <div class="card-body">

                                            <div class="mb-3 row">
                                                <label for="defaultSelect" class="col-md-2 col-form-label" style="font-size: 20px">費用類型</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="type" value="租金" readonly="">
                                                </div>

                                            </div>
                                            <div class="mb-3 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label" style="font-size: 20px">每月租金</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="rentals" id="rentals" readonly="" value="{{$houses->rentals}}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label" style="font-size: 20px">租金期間</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="interval" id="interval"  onchange="calculateAmount()" value="{{$houses->interval}}" placeholder="單位: 月">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="html5-date-input" class="col-md-2 col-form-label" style="font-size: 18px">費用開始日期</label>

                                                <div class="col-md-3">
                                                    <input class="form-control" type="date" name="start_date" onchange="calculateEndDate()">
                                                </div>
                                                <label for="html5-date-input" class="col-md-1" style="font-size: 18px"></label>
                                                <label for="html5-date-input" class="col-md-2 col-form-label" style="font-size: 18px">費用結束日期</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="date" name="end_date" onchange="calculateStarDate()">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label" style="font-size: 20px">應繳總額</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" name="amount" id="amount" value="{{$houses->interval * $houses->rentals}}">
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
                                <button type="submit" class="btn btn-info mx-3">新增租金費用</button>
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
