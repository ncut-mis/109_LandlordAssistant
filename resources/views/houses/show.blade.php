@extends('layouts.master')
@section('title', '主頁')
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
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<script>
	function scrollToTop() {
		// 滾動到頁面頂部
		window.scrollTo({
		  top: 0,
		  behavior: 'smooth'
		});
	}
    $(function(){
        $('.masonry').masonry({
            itemSelector: '.item'
        })});

</script>
	
{{-- 回到最上面的按鈕 --}}
<button onclick="scrollToTop()" class="scroll-to-top">
  <i class="fas fa-chevron-up"></i>
</button>

    <!-- Section-->
<section class="py-5">
	<div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
		<div class="location" style="padding: 20px;border: 1px solid #ccc;width:1200px">
			<div class="tab-content">
				<div class="tab-pane show active fade" id="home" role="tabpanel" aria-labelledby="home-tab"
				 style="padding: 20px;border: 1px solid #ccc;">
					<div class="container" style="overflow-y: auto;padding: 20px;">
						<div class="row" style="white-space: nowrap;">
							<div class="col-md-3 item" style="margin-right: 5px;">
								@foreach($house->image as $image)
									<img src="{{ asset('image/'.$image->image) }}" alt="123" class="img-fluid">
								@endforeach
							</div>
						</div>
					</div>
					<header class="bg-dark py-5">
						<div class="container my-5">
							<div class="row bg-dark text-white py-2 mx-1">
								<div class="col-8 fw-bold">
									<div class="row bg-dark text-white py-2" style="font-size: 3rem;">
										房屋名稱：{{ $house->name }}<hr class="text-white-50">
									</div>
									<div class="row bg-dark text-white py-2">
										<div class="col-2">
											地址：
										</div>
										<div class="col">
											{{ $house->address }}
										</div>
									</div>
									<div class="row bg-dark text-white py-2">
										<div class="col-2">
											介紹：
										</div>
										<div class="col-9">
											{{ $house->introduce }}
										</div>
									</div>
									{{--以下內容待修改--}}

									<div class="row bg-dark text-white py-2">
										<div class="fs-4" style="white-space: nowrap;">
											<div class="fs-4">
												<div class="col-2">
													每
													@if( $expenses->value('interval') == 12)
														年繳
													@elseif( $expenses->value('interval') == 6)
														半年繳
													@elseif( $expenses->value('interval') == 3)
														季繳
													@elseif( $expenses->value('interval') == 1)
														月繳
													@endif
													一次　
													<span class="text-danger">{{ number_format($expenses->value('amount')) }}</span>　元　　
												</div>
											</div>
										</div>
									</div>
									<div class="row bg-dark text-white py-2">
										<div class="col-6">
											可住　{{ $house->num_renter }}人
										</div>
										<div class="col-6">
											最短租　{{ $house->min_period }}個月
										</div>
									</div>
									<div class="row bg-dark text-white py-2">
										<div class="col-6">
											房間　{{ $house->pattern }}　間
										</div>
										<div class="col-6">
											房間　{{ $house->size }}坪
										</div>
									</div>
									<div class="row bg-dark text-white py-2">
										<div class="col-6">
											類型：　{{ $house->type }}　
										</div>
										<div class="col-6">
											第　{{ $house->floor }}層
										</div>
									</div>
									<hr class="text-white-50">
									<div class="row bg-dark text-white py-2">
										<div class="col-9" style="white-space: nowrap;">
											設備<p>
											@foreach($furnishings as $furnishings)
												<button type="button" class="btn btn-outline-light btn-sm">{{ $furnishings->furnish }}</button>
											@endforeach
										</div>
									</div>
									<div class="row bg-dark text-white py-2">
										<div class="col-9" style="white-space: nowrap;">
											特色<p>
											@foreach($features as $features)
												<button type="button" class="btn btn-outline-light btn-sm">{{ $features->feature }}</button>
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-4 fw-bold" style="padding: 20px;">
									<div class="row bg-dark mx-1 text-white">
										<div class="col fs-3">
											房東姓名
										</div>
										<div class="col fs-3">
											{{ $owner_data->name }}
										</div>
									</div><hr>
									<div class="row bg-dark mx-1 text-white">
										<div class="col">
											聯絡方式
										</div>
										<div class="col">
											{{ $owner_data->phone }}
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
				</div>
			</div>
			<div class="column d-flex justify-content-center align-items-center" style="padding: 20px;border: 1px solid #ccc;">
				<a class="btn btn-danger text-center" href="{{ route('home.index') }}">返回</a>
			</div>
		</div>
	</div>
</section>
@endsection
