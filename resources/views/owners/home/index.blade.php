@extends('layouts.owner_master')
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
<button onclick="scrollToTop()" class="scroll-to-top">
  <i class="fas fa-chevron-up"></i>
</button>

<form method="post" action="{{ route('owners.locations.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="from-group mb-3 px-3 py-2">
        <label for="content" class="form-label">新增出租地點</label>
        <input type="text" class="input-group-sm" name="name" required>
        <input type="hidden" name="owner" value="{{ $owner_id }}">
        <button type="submit" class="btn btn-dark btn-sm">新增</button>
    </div>
    </form>
	<div class="house" style="padding: 20px;border: 1px solid #ccc;">
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
			<div class="tab-pane show active fade" id="house-all" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-all-tab">
				@foreach ($locations as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" style="width:90%;padding: 20px;">
							<h2 style="display: inline;">{{ $location->name }}　</h2>
							<span class="translate-middle badge rounded-pill bg-secondary" style="transform: translate(-50%, -50%);">{{ count($location->houses) }}間</span>
							<a class="btn btn-primary" href="{{ route('owners.locations.houses.index',[$owner_id,$location->id]) }}">進入地點</a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="tab-pane fade" id="house-for_rent" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-for_rent-tab">
				@foreach ($for_rent as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" style="width:90%;padding: 20px;">
							<h2 style="display: inline;">{{ $location->name }}　</h2>
							<span class="translate-middle badge rounded-pill bg-secondary" style="transform: translate(-50%, -50%);">{{ count($location->houses) }}間</span>
							<a class="btn btn-primary" href="{{ route('owners.locations.houses.index',[$owner_id,$location->id]) }}">進入地點</a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="house-content tab-pane fade" id="house-listed" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-listed-tab">
				@foreach ($listed as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" style="width:90%;padding: 20px;">
							<h2 style="display: inline;">{{ $location->name }}　</h2>
							<span class="translate-middle badge rounded-pill bg-secondary" style="transform: translate(-50%, -50%);">{{ count($location->houses) }}間</span>
							<a class="btn btn-primary" href="{{ route('owners.locations.houses.index',[$owner_id,$location->id]) }}">進入地點</a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="house-content tab-pane fade" id="house-vacancy" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-vacancy-tab">
				@foreach ($vacancy as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" style="width:90%;padding: 20px;">
							<h2 style="display: inline;">{{ $location->name }}　</h2>
							<span class="translate-middle badge rounded-pill bg-secondary" style="transform: translate(-50%, -50%);">{{ count($location->houses) }}間</span>
							<a class="btn btn-primary" href="{{ route('owners.locations.houses.index',[$owner_id,$location->id]) }}">進入地點</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
