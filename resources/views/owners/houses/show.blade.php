@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
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

{{-- 回到最上面的按鈕 --}}
<button onclick="scrollToTop()" class="scroll-to-top">
  <i class="fas fa-chevron-up"></i>
</button>

    <form method="POST" action="">
		@csrf
		@method('PATCH')
		<div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
			<div class="location" style="padding: 20px;border: 1px solid #ccc;width:1200px">
				<div class="house row_create_house" style="padding: 20px;border: 1px solid #ccc;">
					<div class="row">
						<div class="column" style="width:50%;text-align:right">
							<ul class="nav nav-home mb-3" id="home-tab" role="tablist">
								<li class="nav-item" role="presentation">

									<button class="btn btn-outline-dark active" style="margin-left: 12px"
											id="home-tab" data-bs-toggle="tab" data-bs-target="#home" aria-expanded="true"
											aria-disabled="true" type="button" role="tab" aria-controls="home"
											aria-selected="true">
										房屋資訊
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="btn btn-outline-dark" style="margin-left: 12px"
											id="home-contract-tab" data-bs-toggle="tab" data-bs-target="#home-contract"
											type="button" role="tab" aria-controls="home-contract" aria-selected="false">
										合約
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="btn btn-outline-dark" style="margin-left: 12px"
											id="home-pack-tab" data-bs-toggle="tab" data-bs-target="#home-pack"
											type="button" role="tab" aria-controls="home-pack" aria-selected="false">
										信件
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="btn btn-outline-dark" style="margin-left: 12px"
											id="home-expense-tab" data-bs-toggle="tab" data-bs-target="#home-expense"
											type="button" role="tab" aria-controls="home-expense" aria-selected="false">
										費用
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="btn btn-outline-dark" style="margin-left: 12px"
											id="home-repair-tab" data-bs-toggle="tab" data-bs-target="#home-repair"
											type="button" role="tab" aria-controls="home-repair" aria-selected="false">
										報修
									</button>
								</li>
							</ul>
						</div>

					</div>
				</div>
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
									<div class="col-4 fw-bold" style="padding: 20px;border: 1px solid #ccc;">
										<div class="row bg-dark py-2 mx-1 text-white fs-3">
											<div class="col fw-bold">
												租客姓名
											</div>
											<div class="col fw-bold">
												聯絡方式
											</div>
											<hr class="text-white-50">
										</div>
										@if(!$renters_data->isEmpty())
											@foreach($renters_data as $renters_data)
											<div class="row bg-dark py-2 mx-1 text-white">
												<div class="col fw-bold">
													{{ $renters_data->name }}<hr>
												</div>
												<div class="col fw-bold">
													{{ $renters_data->phone }}<hr>
												</div>
											</div>
											@endforeach
										@else
											<div class="row bg-dark py-2 mx-1 text-white">
												尚無資料
											</div>
										@endif
									</div>
								</div>
							</div>
						</header>
					</div>
					<div class="tab-pane fade" id="home-contract" role="tabpanel" aria-labelledby="home-contract-tab"
					 style="padding: 20px;border: 1px solid #ccc;">
                        <a class="btn btn-danger text-center" href="{{ route('houses.contracts.create', $house->id) }}">上傳合約</a>
                        @php
                            $a=0;
                        @endphp
                        @foreach($contract as $contract)

                           <a href="{{asset('contracts/'.$contract->path)}}" target='_blank'>預覽合約{{$a+=1}}</a>

                        @endforeach

                        </div>
                        <div class="tab-pane fade" id="home-pack" role="tabpanel" aria-labelledby="home-pack-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                            222
                        </div>
                        <div class="tab-pane fade" id="home-expense" role="tabpanel" aria-labelledby="home-expense-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                            333
                        </div>
                        <div class="tab-pane fade" id="home-repair" role="tabpanel" aria-labelledby="home-repair-tab"
                         style="padding: 20px;border: 1px solid #ccc;">
                            444
                        </div>
                    </div>
                    <div class="column d-flex justify-content-center align-items-center" style="padding: 20px;border: 1px solid #ccc;">
                        <a class="btn btn-danger text-center" href="{{ route('owners.home.index',$house->owner_id) }}">返回</a>
                    </div>
                </div>
            </div>
        </form>
    @endsection
