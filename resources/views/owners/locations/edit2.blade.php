@extends('layouts.renter_master_index')
@section('title', '房東頁面-修改地點')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
@section('page-content')
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">地點 /</span>修改地點</h4>
                            <!-- Tabs -->
                            <div class="col-5">
                                <div class="card">
                                    <h5 class="card-header">修改地點名稱</h5>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('owners.locations.update',$location->id)}}" enctype="multipart/form-data">
											@csrf
											@method('PATCH')
                                            <div class="row mb-3">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" value="{{$name}}" required>
												</div>
												<button type="submit" class="col-sm-3 btn btn-primary">確定</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
