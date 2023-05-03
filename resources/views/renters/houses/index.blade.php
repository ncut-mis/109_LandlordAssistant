@extends('layouts.renter_master_index')
@section('title', '租客頁面')
@section('page-content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(session('yes'))
        <div class="alert alert-success">
            {{ session('yes') }}
        </div>

    @elseif (session('no'))
        <div class="alert alert-danger">
            {{ session('no') }}
        </div>
    @endif
    <div class="layout-wrapper">
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
                        <h2 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">租客 /</span>首頁</h2>
                        <!-- Collapse -->
                        <h3>房屋資訊</h3>
                        <div class="row">
                                <div class="col-4">
                                <div class="card">
                                    <h5 class="card-header">填寫邀請碼加入房屋</h5>
                                    <div class="card-body">
                                        <form action="{{ route('owners.houses.rts.store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"
                                                       for="basic-default-name">邀請碼</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="basic-default-name"
                                                           placeholder="填寫邀請碼" name="invite_code" value="">
                                                </div>
                                                <button type="submit" class="col-sm-3 btn btn-primary">確定送出</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <p>
                            @foreach ($houses as $key =>$house)
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <h3 class="card-header">{{ $house->name }}</h3>
                                        <div class="card-body">
                                            <h4 class="card-title text-nowrap mb-2">
                                                @foreach($house -> expenses as $expense)
                                                    租金：{{$expense -> amount}}元&emsp;&emsp;
                                                @endforeach
                                                地點：{{$house->address}}
                                            </h4>
                                            <p class="demo-inline-spacing">
                                                <a class="btn btn-primary me-1" data-bs-toggle="#houses{{ $key }}"
                                                   href="{{ route('renters.houses.show', $house->id) }}" role="button"
                                                   aria-expanded="false"
                                                   aria-controls="houses{{ $key }}">詳細資訊</a>
                                            </p>
                                            <!--    <div class="collapse" id="collapseExample">
                                                    <div class="d-grid d-sm-flex p-3 border">
                                                        <img src="../assets/img/elements/1.jpg" alt="collapse-image"
                                                             height="125" class="me-4 mb-sm-0 mb-2">
                                                        <span>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                                    that it has a more-or-less normal distribution of letters.
                                  </span>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
@endsection
