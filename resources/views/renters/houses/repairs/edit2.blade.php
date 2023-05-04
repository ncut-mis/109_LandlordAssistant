@extends('layouts.renter_master_index')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '報修頁面')
@section('page-content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
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
                                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /</span>報修
                                    </h4>
                                    <!-- Tabs -->
                                    <form method="POST"
                                          action="{{route('renters.houses.repairs.update',$repairs->id)}}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="_token"
                                               value="hqNsD26EYw0jeJ24qgNZpGF0mW6V76t5dQxzLICa">
                                        <h3 class="my-1 fw-semibold">修改 標題 報修</h3>
                                        <input name="id" value="" style="visibility:hidden">
                                        <div class="col-xl-6">
                                            <!-- HTML5 Inputs -->
                                            <div class="card mb-4">
                                                <h5 class="card-header">報修</h5>

                                                <div class="card-body">
                                                    <div class="mb-3 row">


                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="contents"
                                                                      aria-label="With textarea"
                                                                      placeholder="請詳細描述你需要報修的內容"
                                                                      style="height: 248px;">{{$repairs->content}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info mx-3">確定修改</button>
                                        <!--要改為跳回房屋詳細資訊-->
                                        <a type="button" class="btn btn-secondary"
                                           href="{{route('renters.houses.index')}}">返回</a>
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
