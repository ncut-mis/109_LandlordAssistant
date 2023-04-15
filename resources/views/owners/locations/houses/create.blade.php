@extends('layouts.owner_master')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
	
	//驗證表單
	function validateAndSubmit() {
		const inputs = document.querySelectorAll('input, select, textarea');
		let isValid = true;
		//驗證每種類型的輸入都有資料
		inputs.forEach((input) => {
			if (!input.value) {
				isValid = false; //有資料未填寫
			}
		});
		//有資料未填寫
		if (!isValid) {
			const shouldSubmit = confirm('表單中有未填寫的欄位，確定要送出嗎？');
			if (shouldSubmit) {
				document.querySelector('form').submit(); // 送出表單
			}else{
				event.preventDefault(); //取消默認行為
			}
		} else {//資料都有填寫，則直接送出表單
		  document.querySelector('form').submit(); // 送出表單
		}
	}

	  
	$(document).ready(function() {
		// 動態增加圖片路徑
		$('.add-image').click(function() {
			var template = '<div class="input-group"><input type="file" name="image[]" class="form-control"><span class="input-group-addon"><a href="#" class="remove-image"><i class="fa fa-remove"></i></a></span></div>';
			$('.image-container').append(template);
		});

		// 刪除圖片路徑
		$('.image-container').on('click', '.remove-image', function() {
			var inputGroup = $(this).parents('.input-group');
			var previewImage = inputGroup.prev('.preview-image');
			inputGroup.remove();
			previewImage.hide();
			if($('.preview-image:visible').length == 0){
				$('.preview-image-container').hide();
			}
		});
	});

// 預覽圖片
function showPreviewImage(input) {
    var preview = $(input).closest('.image-container').find('.preview-image')[0];
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
        preview.style.display = 'none';
    }
}

// 監聽文件選擇框的变化
$(document).on('change', '.image-container input[type="file"]', function () {
    showPreviewImage(this);
});
</script>

@section('page-content')
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{{-- 回到最上面的按鈕 --}}
	<button onclick="scrollToTop()" class="scroll-to-top">
	  <i class="fas fa-chevron-up"></i>
	</button>
	
	<form method="post" action="{{ route('owners.locations.houses.store',$locations->id) }}" enctype="multipart/form-data">
		@csrf
		<div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
			<div class="location" style="padding: 20px;border: 1px solid #ccc;width:800px">
				<div class="row">
					<div class="left-column"><h2>{{ $locations->name }}</h2></div>
				</div>
				<div class="house row_create" id="house-form" style="padding: 20px;border: 1px solid #ccc;">
					<div class="row">
						<div class="row image-container">
							<div class="col-md-12">
								<div class="preview-image-container">

									<img class="preview-image" id="preview-image-0" src="" alt="預覽圖片" style="display: none; width: 100%; max-width: 300px; margin-top: 10px;">
								</div>
								<div class="input-group">
									<input type="file" name="image[]" class="form-control">
									<span class="input-group-addon">
										<a href="#" class="remove-image"><i class="fa fa-remove"></i></a>
									</span>
								</div>
							</div>
						</div>
						<div class="row add-more-container">
						  <div class="col-md-12">
							<button class="btn btn-primary add-image" type="button"><i class="fa fa-plus"></i> 新增圖片</button>
						  </div>
						</div>
					</div>
					<p>
					<div class="row">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">房屋名稱</span>
							<input type="text" class="form-control" name="name"
								required aria-describedby="inputGroup-sizing-default">
						</div>
					</div>
					
					<div class="row">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">地址</span>
							<input type="text" class="form-control" name="address"
								required aria-describedby="inputGroup-sizing-default">
						</div>
					</div>
					
					<div class="row">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">介紹</span>
							<textarea class="form-control" name="introduce" rows="5" cols="50"
								aria-describedby="inputGroup-sizing-default"></textarea>
						</div>
					</div><hr>
					
					<div class="row">
						<div class="first-column" style="width:50%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">每</span>
								<select class="form-select" id="inputGroupSelect01" name="interval" style="text-align:center">
									<option value="" disabled selected>--選擇區間--</option>
									<option value="12">年繳</option>
									<option value="6">半年繳</option>
									<option value="3">季繳</option>
									<option value="1">月繳</option>
								</select>
								<span class="input-group-text" id="inputGroup-sizing-default">一次</span>
							</div>
						</div> 
						<div class="second-column" style="width:40%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">租金</span>
								<span class="input-group-text">$</span>
								<input type="text" class="form-control" name="amount"
									aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="first-column" style="width:30%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">可住</span>
								<input type="text" class="form-control" name="num_renter" style="text-align:right"
									aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
								<span class="input-group-text" id="inputGroup-sizing-default">人</span>
							</div>
						</div> 
						<div class="second-column" style="width:40%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">最短租</span>
								<input type="text" class="form-control" name="min_period" style="text-align:right"
									aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
								<span class="input-group-text" id="inputGroup-sizing-default">個月</span>
							</div>
						</div> 
						<div class="third-column" style="width:30%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">房間</span>
								<input type="text" class="form-control" name="pattern" style="text-align:right"
									aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
								<span class="input-group-text" id="inputGroup-sizing-default">間</span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="first-column" style="width:30%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">房間</span>
								<input type="text" class="form-control" name="size" style="text-align:right"
									aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
								<span class="input-group-text" id="inputGroup-sizing-default">坪</span>
							</div>
						</div> 
						<div class="second-column" style="width:40%;">
							<div class="input-group mb-3">
								<label class="input-group-text" for="inputGroupSelect01">類型</label>
									<select class="form-select" id="inputGroupSelect01" name="type" style="text-align:center">
										<option value="" disabled selected>--請選擇--</option>
										<option value="雅房">雅房</option>
										<option value="分租套房">分租套房</option>
										<option value="獨立套房">獨立套房</option>
										<option value="整層住家">整層住家</option>
									</select>
							</div>
						</div>
						<div class="third-column" style="width:30%;">
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">第</span>
								<input type="text" class="form-control" name="floor" style="text-align:right"
									aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
								<span class="input-group-text" id="inputGroup-sizing-default">層</span>
							</div>
						</div> 
					</div>

					<div class="row">
						<div class="first-column" style="width:50%;">
							<div class="input-group mb-3" style="height:20px;">
								<span class="input-group-text" id="inputGroup-sizing-default">設備</span>
							</div>

							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="冷氣" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="冷氣">
								
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="電風扇" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="電風扇">
							</div>

							<div class="input-group mb-3" style="height:20px">
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="熱水器" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="熱水器">
								
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="洗衣機" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="洗衣機">
							</div>

							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="冰箱" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="冰箱">

								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="網路" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="網路">
							</div>

							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="天然瓦斯" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="天然瓦斯">
							</div>
						</div>
						
						<div class="second-column" style="width:50%;">
							<div class="input-group mb-3" style="height:20px;">
								<span class="input-group-text" id="inputGroup-sizing-default">特色</span>
							</div>

							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="可養寵物" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="可養寵物">
							
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="可開伙" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="可開伙">
							</div>

							<div class="input-group mb-3" style="height:20px">
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="有管理員" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="有管理員">
							
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="垃圾代收" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="垃圾代收">
							</div>

							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="可報稅" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="可報稅">
							
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="可入籍" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="可入籍">
							</div>

							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="有車位" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="有車位">
							
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="有電梯" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="有電梯">
							</div>
							
							<div class="input-group mb-3" style="height:20px">	
								<div class="input-group-text">
									<input class="form-check-input mt-0" type="checkbox" name="features[]" value="有陽台" style="width:20px;transform: translate(50%, 10%);">
								</div>
								<input type="text" class="form-control" disabled value="有陽台">
							</div>							
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:33%;text-align:right">
							<button class="btn btn-primary" type="submit" name="unpublish" value="閒置" onclick="validateAndSubmit()">
								儲存
							</button>
						</div>
						<div class="center-column" style="width:34%;text-align:center">
							<button class="btn btn-danger" type="submit" name="publish" value="已刊登">
								刊登房屋
							</button>
						</div>
						<div class="right-column" style="width:33%;text-align:left">
							<a class="btn btn-secondary text-center" href="{{ route('owners.locations.houses.show',[$owner_id, $locations->id]) }}">返回</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
