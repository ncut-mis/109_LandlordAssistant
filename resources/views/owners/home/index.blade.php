@extends('layouts.owner_master')
<link href="{{ 'css/house_index.css' }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
    <div class="from-group mb-3 px-3 py-2">
        <label for="content" class="form-label">新增出租地點</label>
        <input type="text" class="input-group-sm">
        <button type="button" class="btn btn-dark btn-sm">新增</button>
    </div>
	<div class="house" style="padding: 20px;border: 1px solid #ccc;">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark active" style="margin-left: 12px"
						id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
						aria-disabled="true" type="button" role="tab" aria-controls="pills-all"
						aria-selected="true">
					全部
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="pills-for_rent-tab" data-bs-toggle="pill" data-bs-target="#pills-for_rent"
						type="button" role="tab" aria-controls="pills-for_rent" aria-selected="false">
					出租中
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="pills-listed-tab" data-bs-toggle="pill" data-bs-target="#pills-listed"
						type="button" role="tab" aria-controls="pills-listed" aria-selected="false">
					已刊登
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="btn btn-outline-dark" style="margin-left: 12px"
						id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
						type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
					閒置
				</button>
			</li>
		</ul>
		<div class="location" style="padding: 20px;border: 1px solid #ccc;">
			<div class="row">
				<div class="left-column" style="width:90%;padding: 20px;"><h2>放地點名稱</h2></div>
				<div class="right-column" style="width:10%;padding: 20px;">
					<div class="btn-group">
						<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							按鈕
						</button>
						<ul class="dropdown-menu location" style="text-align:center;">
							<li><a class="dropdown-item" href="#">修改地點</a></li>
							<li><a class="dropdown-item" href="#">刪除地點</a></li>
							<li><a class="dropdown-item" href="#">加入房屋</a></li>
							<hr>
							<li><a class="dropdown-item" href="#">公告</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="house" style="padding: 20px;border: 1px solid #ccc;">
				<div class="row">
					<div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
					<div class="right-column" style="width:80%;padding: 20px;">狀態</div>
				</div>
				<div class="row">
					<div class="row_house">
						<div class="column">放名稱</div>
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
				<div class="row">
					<div class="row_house">
						<div class="column">放名稱</div>
						<div class="column">放狀態</div>
						<div class="column"><button type="button" class="btn btn-outline-primary">編輯</button></div>
						<div class="column"><button type="button" class="btn btn-outline-danger">刪除</button></div>
						<div class="column">
								<button class="btn btn-primary" type="button" 
								data-bs-toggle="collapse" data-bs-target="#collapseWidthExample2" aria-expanded="false" 
								aria-controls="collapseWidthExample2">
								按鈕
								</button>
						</div>
					</div>
					<div class="collapse collapse-horizontal" id="collapseWidthExample2">
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
