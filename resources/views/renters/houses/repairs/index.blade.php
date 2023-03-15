@extends('layouts.renter_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '報修頁面')
@section('page-content')
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div class="from-group mb-3 px-3 py-2">
        <label for="content" class="form-label">需要報修嗎?</label>
        <button type="button" class="btn btn-dark btn-sm">新增</button>
    </div>	<div class="house" style="padding: 20px;border: 1px solid #ccc;">
		<ul class="nav nav-house mb-3" id="house-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark active" style="margin-left: 12px"
						id="house-all-tab" data-bs-toggle="collapse" data-bs-target="#house-all" aria-expanded="true"
						type="button" role="tab" aria-controls="house-all"
						aria-selected="true">
					全部
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="house-for_rent-tab" data-bs-toggle="collapse" data-bs-target="#house-for_rent"
						type="button" role="tab" aria-controls="house-for_rent" aria-selected="false">
					未繳費
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="house-listed-tab" data-bs-toggle="collapse" data-bs-target="#house-listed"
						type="button" role="tab" aria-controls="house-listed" aria-selected="false">
					已繳費
				</button>
			</li>
		</ul>
		<div class="location collapse show" id="house-all" style="padding: 20px;border: 1px solid #ccc;">
			<div class="row">
				<div class="left-column" data-bs-toggle="collapse" data-bs-target="#"
				aria-expanded="false" aria-controls="#" style="width:90%;padding: 20px;"><h2>123</h2></div>
				<div class="right-column" style="width:10%;padding: 20px;">
						<button type="button" class="btn btn-danger" href="#">繳費</button>
				</div>
			</div>
			<div class="house collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses">
				<div class="row">
					<div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
					<div class="right-column" style="width:80%;padding: 20px;">狀態</div>
				</div>
				<div class="row">
					<div class="row_house">
						<div class="column">123</div>
						<div class="column">放狀態</div>
						<div class="column"><button type="button" class="btn btn-outline-primary">編輯</button></div>
						<div class="column"><button type="button" class="btn btn-outline-danger">刪除</button></div>
						<div class="column">
								<button class="btn btn-primary" type="button"
								data-bs-toggle="collapse" data-bs-target="#collapseWidthExample1" aria-expanded="false"
								aria-controls="collapseWidthExample1">
								按鈕
								</button>
						</div>
					</div>
					<div class="collapse collapse-horizontal" id="collapseWidthExample1">
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
			</div>
		</div>
	</div>
@endsection
