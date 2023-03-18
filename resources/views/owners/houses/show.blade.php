@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    $(function(){
        $('.masonry').masonry({
            itemSelector: '.item'
        })});

</script>
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
											<div class="col">
												{{ $house->introduce }}
											</div>
										</div>
										{{--以下內容待修改--}}
										
										<div class="row bg-dark text-white py-2">
											<div class="fs-4" style="white-space: nowrap;">
												<div class="fs-4">
													<div class="col-2">
														<span class="text-danger">{{ number_format($house->expenses->value('amount')) }}</span>　元/月
														　　繳納區間：{{ $house->expenses->value('interval') }}月一次
													</div>
												</div>
											</div>
										</div>
										<div class="row bg-dark text-white py-2">
											<div class="col-2">
												可住人數：
											</div>
											<div class="col-2">
												{{ $house->num_renter }}
											</div>
											<div class="col-2">
												最短租期：
											</div>
											<div class="col-2">
												{{ $house->min_period }}
											</div>
										</div>
										<div class="row bg-dark text-white py-2">
											<div class="col-2">
												格局：
											</div>
											<div class="col-2">
												{{ $house->pattern }}　間
											</div>
											<div class="col-2">
												坪數：
											</div>
											<div class="col-2">
												{{ $house->size }}
											</div>
										</div>
										<div class="row bg-dark text-white py-2">
											<div class="col-2">
												類型：
											</div>
											<div class="col-2">
												{{ $house->type }}　
											</div>
											<div class="col-2">
												樓層：
											</div>
											<div class="col-2">
												{{ $house->floor }}
											</div>
										</div>
										<hr class="text-white-50">
										<div class="row bg-dark text-white py-2">
											<div class="col-2">
												特色<p>
												@foreach($house->features as $features)
													<button type="button" class="btn btn-outline-light btn-sm">{{ $features->feature }}</button>
												@endforeach
											</div>
										</div>
										<div class="row bg-dark text-white py-2">
											<div class="col-2">
												設備<p>
												@foreach($house->furnishings as $furnishings)
													<button type="button" class="btn btn-outline-light btn-sm">{{ $furnishings->furnish }}</button>
												@endforeach
											</div>
										</div>
									</div>
									<div class="col-4 fw-bold" style="padding: 20px;border: 1px solid #ccc;">
										<div class="row bg-dark py-2 mx-1 text-white-50 fs-3">
											<div class="col fw-bold">
												租客姓名
											</div>
											<div class="col fw-bold">
												聯絡方式
											</div>
											<hr class="text-white-50">
										</div>
										<div class="row bg-dark py-2 mx-1 text-white-50">
											<div class="col fw-bold">
												租客<hr>
											</div>
											<div class="col fw-bold">
												電話<hr>
											</div>
										</div>
										<div class="row bg-dark py-2 mx-1 text-white-50">
											<div class="col fw-bold">
												租客<hr>
											</div>
											<div class="col fw-bold">
												電話<hr>
											</div>
										</div>
										<div class="row bg-dark py-2 mx-1 text-white-50">
											<div class="col fw-bold">
												租客<hr>
											</div>
											<div class="col fw-bold">
												電話<hr>
											</div>
										</div>
										<div class="row bg-dark py-2 mx-1 text-white-50">
											<div class="col fw-bold">
												租客<hr>
											</div>
											<div class="col fw-bold">
												電話<hr>
											</div>
										</div>
										<div class="row bg-dark py-2 mx-1 text-white-50">
											<div class="col fw-bold">
												租客<hr>
											</div>
											<div class="col fw-bold">
												電話<hr>
											</div>
										</div>
									</div>
								</div>
							</div>
						</header>
					</div>
					<div class="tab-pane fade" id="home-contract" role="tabpanel" aria-labelledby="home-contract-tab"
					 style="padding: 20px;border: 1px solid #ccc;">
						111
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
					<div class="column d-flex justify-content-center align-items-center" style="padding: 20px;border: 1px solid #ccc;">
						<a class="btn btn-danger text-center" href="{{ route('owners.home.index',$house->owner_id) }}">返回</a>
					</div>
				</div>
			</div>			
		</div>
	</form>
@endsection
