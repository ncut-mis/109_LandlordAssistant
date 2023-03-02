@extends('layouts.master')
@section('title', '主頁')
@section('content')
<header class="bg-dark py-5">
    <div role="tw-city-selector"></div>
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>



<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ($houses as $house)

            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    @foreach($house->image as $image)
                    <img src="image/{{ $image->image }}" />
                    @endforeach
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                           <h5 class="fw-bolder"> {{ $house->name }}</h5>
                            <!-- Product price-->
                           介紹:{{ $house->introduce }}
                            <br>
                            房屋類型:{{ $house->type }}

                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">檢視更多資訊</a></div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>

@endsection
