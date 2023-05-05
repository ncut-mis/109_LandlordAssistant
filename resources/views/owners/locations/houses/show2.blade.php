@extends('layouts.owner_master_index')
@section('title', '房東頁面')
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
    <main>
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
                            <h2 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房東 /</span>首頁</h2>
                            <!-- Collapse -->
                            <h3>房屋資訊</h3>
                            <div class="row">
                                @foreach ($houses as $house)
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <h3 class="card-header" href="{{ route('owners.houses.show', $house->id) }}">{{ $house->name }} | {{ $house->county }} {{ $house->area }} {{ $house->address }}</h3>
                                        <div class="card-body">

                                            <p class="demo-inline-spacing">
                                                <a class="btn btn-primary me-1" data-bs-toggle="#houses0" href="{{ route('owners.houses.show', $house->id) }}" role="button" aria-expanded="false" aria-controls="houses0">進入房屋</a>
                                            </p>

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
    </main>
@endsection
