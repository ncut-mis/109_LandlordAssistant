@extends('layouts.renter_master_index')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '報修頁面')
@section('page-content')

    @if(session('error'))
        <div class="mx-3 my-3">
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <form method="post" action="{{ route('owners.houses.repairs.reply.store', ['repair' => $repair_id]) }}">
        @csrf
        <div id="layoutSidenav_content">
            <main>
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
                                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /</span>報修回覆
                                        </h4>
                                        <!-- Tabs -->
                                        <form method="#" action="#">
                                            @csrf
                                            <input type="hidden" name="house_id"
                                                   value="{{$house_id}}">
                                            <h3 class="my-1 fw-semibold">回覆 {{$repair_title}} 報修</h3>
                                                <input name="id" value="{{$repair_id}}" style="visibility:hidden">
                                            <div class="col-xl-6">
                                                <!-- HTML5 Inputs -->
                                                <div class="card mb-4">
                                                    <h3 class="card-header">回覆</h3>

                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" name="contents" aria-label="With textarea" placeholder="請輸入內容" style="height: 248px;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info mx-3">建立回覆</button>
                                        </form>
                                            <a type="button" class="btn btn-secondary"
                                               href="javascript:void(0)" onclick="history.back()">返回</a>
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
            </main>
            <div class="buy-now">
                <a href="{{url('/')}}" class="btn btn-danger btn-buy-now">回到租屋網站</a>
                <!--target="_blank" 改成用新視窗開啟-->
            </div>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">109_LandlordAssistant</div>
                    </div>
                </div>
            </footer>
        </div>
    </form>
@endsection
