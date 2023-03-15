@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
	<form method="post" action="{{ route('owners.locations.houses.store',$locations->id) }}">
		@csrf
		<div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
			<div class="location" style="padding: 20px;border: 1px solid #ccc;width:800px">
				<div class="row">
					<div class="left-column"><h2>{{ $locations->name }}</h2></div>
				</div>
				<div class="house row_create" style="padding: 20px;border: 1px solid #ccc;">
					<div class="row">
						<div class="left-column" style="width:22%;">房屋名稱</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="name" required>
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">地址</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="address" required>
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">設備</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="furnish" required>
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">租金</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="amount">
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">特色</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="feature">
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">介紹</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="introduce">
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:33%;text-align:right">
							<button class="btn btn-primary" type="submit">
								儲存
							</button>
						</div>
						<div class="center-column" style="width:34%;text-align:center">
							<button class="btn btn-danger">
								刊登房屋
							</button>
						</div>
						{{--應該要刪除--}}
						<div class="right-column" style="width:33%;text-align:left">
							<button class="btn btn-secondary">
								取消刊登
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
