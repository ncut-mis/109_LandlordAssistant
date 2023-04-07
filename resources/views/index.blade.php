@extends('layouts.master')
@section('title', '主頁')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@section('content')
<style>
  .scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 10px;
    padding: 8px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50%;
    transition: all .3s ease-in-out;
  }
  
  .scroll-to-top:hover {
    background-color: #eee;
    cursor: pointer;
  }
  
  .scroll-to-top i {
    font-size: 20px;
    color: #333;
  }
</style>

<script>
	function scrollToTop() {
		// 滾動到頁面頂部
		window.scrollTo({
		  top: 0,
		  behavior: 'smooth'
		});
	}
</script>
	
{{-- 回到最上面的按鈕 --}}
<button onclick="scrollToTop()" class="scroll-to-top">
  <i class="fas fa-chevron-up"></i>
</button>

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
                    <div style="@if(count($house->image)>1)overflow-x: scroll;@endif height: 170px;white-space: nowrap;">
						@foreach($house->image as $image)
						<img src="image/{{ $image->image }}" class="img-fluid" style="height: 150px;width:230px">
						@endforeach
					</div>
					<!-- Product details-->
                    <div class="card-body">
                        <div class="text-center">
                            <!-- Product name-->
                           <h5 class="fw-bolder"> {{ $house->name }}</h5>
                            <!-- Product price-->
							<div class="input-group">
								<span class="input-group-text" id="inputGroup-sizing-default">介紹</span>
								<div style="height: 100px;">
									<textarea class="form-control" name="introduce" rows="3" cols="50" style="height: 100%;" disabled
										aria-describedby="inputGroup-sizing-default">{{ $house->introduce }}</textarea>
								</div>
							</div>
							<p>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">房屋類型</span>
								<input type="text" class="form-control" name="address" value="{{ $house->type }}" disabled
									required aria-describedby="inputGroup-sizing-default">
							</div>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('houses.show', $house->id) }}">檢視更多資訊</a></div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>

@endsection
