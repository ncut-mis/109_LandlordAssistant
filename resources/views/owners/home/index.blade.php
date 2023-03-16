@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div class="from-group mb-3 px-3 py-2">
        <label for="content" class="form-label">新增出租地點</label>
        <input type="text" class="input-group-sm">
        <button type="button" class="btn btn-dark btn-sm">新增</button>
    </div>
	<div class="house" style="padding: 20px;border: 1px solid #ccc;">
      	<ul class="nav nav-house mb-3" id="house-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark active" style="margin-left: 12px"
                        id="house-all-tab" data-bs-toggle="tab" data-bs-target="#house-all" aria-expanded="true"
                        aria-disabled="true" type="button" role="tab" aria-controls="house-all"
						aria-selected="true">
					全部
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="house-for_rent-tab" data-bs-toggle="tab" data-bs-target="#house-for_rent"
						type="button" role="tab" aria-controls="house-for_rent" aria-selected="false">
					出租中
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="house-listed-tab" data-bs-toggle="tab" data-bs-target="#house-listed"
						type="button" role="tab" aria-controls="house-listed" aria-selected="false">
					已刊登
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="house-vacancy-tab" data-bs-toggle="tab" data-bs-target="#house-vacancy"
						type="button" role="tab" aria-controls="house-vacancy" aria-selected="false">
					閒置
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
						<div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
						aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
						<div class="right-column" style="width:10%;padding: 20px;">
							<div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									按鈕
								</button>
								<ul class="dropdown-menu location" style="text-align:center;">
									<li><a class="dropdown-item" href="#">修改地點</a></li>
									<li><a class="dropdown-item" href="#">刪除地點</a></li>
									<li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
									<hr>
									<li><a class="dropdown-item" href="#">公告</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
						<div class="row">
							<div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
							<div class="right-column" style="width:80%;padding: 20px;">狀態</div>
						</div>
						@foreach ($location->houses as $house)
							<div class="row">
									<div class="row_house">
										
										<div class="column">
											<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
											{{ $house->name }}</a>
										</div>
										<div class="column">
											<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
											{{ $house->lease_status }}</a>
										</div>
										<div class="column">
											<form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
												@csrf
												<button type="submit" class="btn btn-outline-primary">編輯</button>
											</form>
										</div>
										<div class="column">
											<form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-outline-danger">刪除</button>
											</form>
										</div>
										<div class="column">
											<button class="btn btn-primary" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
											aria-controls="collapseWidthExample{{ $house->id }}">
											按鈕
											</button>
										</div>
									</div>
								
								<div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
									<div class="collapsed-content">
										<div class="row">
											<div class="column">期間</div>
											<div class="column">費用類型</div>
											<div class="column">總金額</div>
											<div class="column">狀態</div>
										</div>
										<div class="row_list">
											<div class="column">1</div>
											<div class="column">2</div>
											<div class="column">456</div>
											<div class="column">456</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
			<div class="tab-pane fade" id="house-for_rent" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-for_rent-tab">
				@foreach ($for_rent as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
							 aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
						<div class="right-column" style="width:10%;padding: 20px;">
							<div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									按鈕
								</button>
								<ul class="dropdown-menu location" style="text-align:center;">
									<li><a class="dropdown-item" href="#">修改地點</a></li>
									<li><a class="dropdown-item" href="#">刪除地點</a></li>
									<li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
									<hr>
									<li><a class="dropdown-item" href="#">公告</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
						<div class="row">
							<div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
							<div class="right-column" style="width:80%;padding: 20px;">狀態</div>
						</div>
						@foreach ($location->houses as $house)
							<div class="row">
								<div class="row_house">
									<div class="column">
										<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
										{{ $house->name }}</a>
									</div>
									<div class="column">
										<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
										{{ $house->lease_status }}</a>
									</div>
									<div class="column">
										<form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
											@csrf
											<button type="submit" class="btn btn-outline-primary">編輯</button>
										</form>
									</div>
									<div class="column">
										<form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-outline-danger">刪除</button>
										</form>
									</div>
									<div class="column">
										<button class="btn btn-primary" type="button"
												data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
												aria-controls="collapseWidthExample{{ $house->id }}">
											按鈕
										</button>
									</div>
								</div>
								<div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
									<div class="collapsed-content">
										<div class="row">
											<div class="column">期間</div>
											<div class="column">費用類型</div>
											<div class="column">總金額</div>
											<div class="column">狀態</div>
										</div>
										<div class="row_list">
											<div class="column">1</div>
											<div class="column">2</div>
											<div class="column">456</div>
											<div class="column">456</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
			<div class="house-content tab-pane fade" id="house-listed" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-listed-tab">
				@foreach ($listed as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
							 aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
						<div class="right-column" style="width:10%;padding: 20px;">
							<div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									按鈕
								</button>
								<ul class="dropdown-menu location" style="text-align:center;">
									<li><a class="dropdown-item" href="#">修改地點</a></li>
									<li><a class="dropdown-item" href="#">刪除地點</a></li>
									<li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
									<hr>
									<li><a class="dropdown-item" href="#">公告</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
						<div class="row">
							<div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
							<div class="right-column" style="width:80%;padding: 20px;">狀態</div>
						</div>
						@foreach ($location->houses as $house)
							<div class="row">
								<div class="row_house">
									<div class="column">
										<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
										{{ $house->name }}</a>
									</div>
									<div class="column">
										<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
										{{ $house->lease_status }}</a>
									</div>
									<div class="column">
										<form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
											@csrf
											<button type="submit" class="btn btn-outline-primary">編輯</button>
										</form>
									</div>
									<div class="column">
										<form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-outline-danger">刪除</button>
										</form>
									</div>
									<div class="column">
										<button class="btn btn-primary" type="button"
												data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
												aria-controls="collapseWidthExample{{ $house->id }}">
											按鈕
										</button>
									</div>
								</div>
								<div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
									<div class="collapsed-content">
										<div class="row">
											<div class="column">期間</div>
											<div class="column">費用類型</div>
											<div class="column">總金額</div>
											<div class="column">狀態</div>
										</div>
										<div class="row_list">
											<div class="column">1</div>
											<div class="column">2</div>
											<div class="column">456</div>
											<div class="column">456</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
			<div class="house-content tab-pane fade" id="house-vacancy" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-vacancy-tab">
				@foreach ($vacancy as $key =>$location)
					@if($key >= 1)
						<hr>
					@endif
					<div class="row">
						<div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
							 aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
						<div class="right-column" style="width:10%;padding: 20px;">
							<div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									按鈕
								</button>
								<ul class="dropdown-menu location" style="text-align:center;">
									<li><a class="dropdown-item" href="#">修改地點</a></li>
									<li><a class="dropdown-item" href="#">刪除地點</a></li>
									<li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
									<hr>
									<li><a class="dropdown-item" href="#">公告</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
						<div class="row">
							<div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
							<div class="right-column" style="width:80%;padding: 20px;">狀態</div>
						</div>
						@foreach ($location->houses as $house)
							<div class="row">
								<div class="row_house">
									<div class="column">
										<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
										{{ $house->name }}</a>
									</div>
									<div class="column">
										<a href="{{ route('owners.houses.show', $house->id) }}" style="color: inherit;  text-decoration: none;">
										{{ $house->lease_status }}</a>
									</div>
									<div class="column">
										<form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
											@csrf
											<button type="submit" class="btn btn-outline-primary">編輯</button>
										</form>
									</div>
									<div class="column">
										<form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-outline-danger">刪除</button>
										</form>
									</div>
									<div class="column">
										<button class="btn btn-primary" type="button"
												data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
												aria-controls="collapseWidthExample{{ $house->id }}">
											按鈕
										</button>
									</div>
								</div>
								<div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
									<div class="collapsed-content">
										<div class="row">
											<div class="column">期間</div>
											<div class="column">費用類型</div>
											<div class="column">總金額</div>
											<div class="column">狀態</div>
										</div>
										<div class="row_list">
											<div class="column">1</div>
											<div class="column">2</div>
											<div class="column">456</div>
											<div class="column">456</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</div>
	</div>	
@endsection
