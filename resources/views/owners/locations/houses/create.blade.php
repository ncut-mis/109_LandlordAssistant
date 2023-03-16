@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // 增加設備輸入欄位
  $(".add-more").click(function(){
    var html = '<div class="input-group"><input type="text" name="furnish[]" required><button type="button" class="btn btn-danger btn-sm remove">刪除</button></div>';
    $(".input-group:last").after(html);
  });  
  // 增加特色輸入欄位
  $(".add-feature-more").click(function(){
    var html = '<div class="feature-group"><input type="text" name="feature[]"><button type="button" class="btn btn-danger btn-sm remove">刪除</button></div>';
    $(".feature-group:last").after(html);
  });
  
  // 刪除設備輸入欄位
  $(".furnish-container").on("click",".remove",function(){
    $(this).parents(".input-group").remove();
  });  
  // 刪除特殊輸入欄位
  $(".feature-container").on("click",".remove",function(){
    $(this).parents(".feature-group").remove();
  });
});
</script>
@section('page-content')
	<form method="post" action="{{ route('owners.locations.houses.store',$locations->id) }}">
		@csrf
		<div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
			<div class="location" style="padding: 20px;border: 1px solid #ccc;width:800px">
				<div class="row">
					<div class="left-column"><h2>{{ $locations->name }}</h2></div>
				</div>
				<div class="house row_create" id="house-form" style="padding: 20px;border: 1px solid #ccc;">
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
						<div class="furnish-container" style="width:78%;">
							<div class="input-group">
								<input type="text" name="furnish[]" required>
								<button type="button" class="btn btn-danger btn-sm remove">刪除</button>
							</div>
							<div class="add-more-container">
								<button type="button" class="btn btn-success btn-sm add-more">增加</button>
							</div>
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
						<div class="feature-container" style="width:78%;">
							<div class="feature-group">
								<input type="text" name="feature[]">
								<button type="button" class="btn btn-danger btn-sm remove">刪除</button>
							</div>
							<div class="add-more-container">
								<button type="button" class="btn btn-success btn-sm add-feature-more">增加</button>
							</div>
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
							<a class="btn btn-secondary text-center" href="{{ route('owners.home.index',$owner_id) }}">返回</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
