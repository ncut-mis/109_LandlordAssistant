@extends('layouts.owner_master_index')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif
@if (session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

//刪除跳窗
function confirmDelete(event, houseId) {
	event.preventDefault(); // 防止表單預設提交行為
    const leaseStatus = event.target.getAttribute('data-lease-status');
    if (leaseStatus === "出租中") {
        alert("該房屋正在出租中，不能刪除");
    } else {
        if (confirm('確定要刪除嗎？')) {
            document.getElementById('delete-form-' + houseId).submit(); // 提交表單
        }
    }
}

</script>

{{-- 回到最上面的按鈕 --}}
{{--<button onclick="scrollToTop()" class="scroll-to-top">--}}
{{--  <i class="fas fa-chevron-up"></i>--}}
{{--</button>--}}
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
						<form method="post" action="{{ route('owners.locations.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="col-5">
								<div class="card">
									<h5 class="card-header">新增出租地點</h5>
									<div class="card-body">

											<div class="row mb-3">
												<div class="col-sm-8">
													<input type="text" class="form-control" name="name" required>
													<input type="hidden" name="owner" value="{{ $owner_id }}">
												</div>
												<button type="submit" class="col-sm-3 btn btn-primary">新增</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</form>
						<div class="col-7" style="display: inline-block;"><h3>地點資訊</h3></div>
						<ul class="nav nav-house mb-3" id="house-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="btn btn-outline-dark active" style="margin-left: 12px"
										id="house-all-tab" data-bs-toggle="tab" data-bs-target="#house-all" aria-expanded="true"
										aria-disabled="true" type="button" role="tab" aria-controls="house-all"
										aria-selected="true">
									全部
									<span class="badge rounded-pill bg-secondary">{{ count($locations) }}</span>
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="btn btn-outline-dark" style="margin-left: 12px"
										id="house-for_rent-tab" data-bs-toggle="tab" data-bs-target="#house-for_rent"
										type="button" role="tab" aria-controls="house-for_rent" aria-selected="false">
									出租中
									<span class="badge rounded-pill bg-secondary">{{ count($for_rent) }}</span>
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="btn btn-outline-dark" style="margin-left: 12px"
										id="house-listed-tab" data-bs-toggle="tab" data-bs-target="#house-listed"
										type="button" role="tab" aria-controls="house-listed" aria-selected="false">
									已刊登
									<span class="badge rounded-pill bg-secondary">{{ count($listed) }}</span>
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="btn btn-outline-dark" style="margin-left: 12px"
										id="house-vacancy-tab" data-bs-toggle="tab" data-bs-target="#house-vacancy"
										type="button" role="tab" aria-controls="house-vacancy" aria-selected="false">
									閒置
									<span class="badge rounded-pill bg-secondary">{{ count($vacancy) }}</span>
								</button>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane show active fade" id="house-all" role="tabpanel" style="padding: 20px;" aria-labelledby="house-all-tab">
								@foreach ($locations as $key =>$location)
									<div class="col-12">
										<div class="card mb-4">	
											<div style="display: flex; align-items: center;">
												<h3 class="card-header" style="display: inline-block;">{{ $location->name }}</h3>
												<span style="display: inline-block;" class="badge rounded-pill bg-secondary">{{ count($location->houses) }}間</span>
												<div class="card-body">
													<a class="btn btn-primary" href="{{ route('owners.locations.houses.show',[$owner_id,$location->id]) }}">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
															<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="tab-pane fade" id="house-for_rent" role="tabpanel" style="padding: 20px;" aria-labelledby="house-for_rent-tab">
								@foreach ($for_rent as $key =>$location)
									<div class="col-12">
										<div class="card mb-4">	
											<div style="display: flex; align-items: center;">
												<h3 class="card-header" style="display: inline-block;">{{ $location->name }}</h3>
												<span style="display: inline-block;" class="badge rounded-pill bg-secondary">{{ count($location->houses) }}間</span>
												<div class="card-body">
													<a class="btn btn-primary" href="{{ route('owners.locations.houses.show',[$owner_id,$location->id]) }}">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
															<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="house-content tab-pane fade" id="house-listed" role="tabpanel" style="padding: 20px;" aria-labelledby="house-listed-tab">
								@foreach ($listed as $key =>$location)
									<div class="col-12">
										<div class="card mb-4">	
											<div style="display: flex; align-items: center;">
												<h3 class="card-header" style="display: inline-block;">{{ $location->name }}</h3>
												<span style="display: inline-block;" class="badge rounded-pill bg-secondary">{{ count($location->houses) }}間</span>
												<div class="card-body">
													<a class="btn btn-primary" href="{{ route('owners.locations.houses.show',[$owner_id,$location->id]) }}">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
															<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="house-content tab-pane fade" id="house-vacancy" role="tabpanel" style="padding: 20px;" aria-labelledby="house-vacancy-tab">
								@foreach ($vacancy as $key =>$location)
									<div class="col-12">
										<div class="card mb-4">	
											<div style="display: flex; align-items: center;">
												<h3 class="card-header" style="display: inline-block;">{{ $location->name }}</h3>
												<span style="display: inline-block;" class="badge rounded-pill bg-secondary">{{ count($location->houses) }}間</span>
												<div class="card-body">
													<a class="btn btn-primary" href="{{ route('owners.locations.houses.show',[$owner_id,$location->id]) }}">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
															<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
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
