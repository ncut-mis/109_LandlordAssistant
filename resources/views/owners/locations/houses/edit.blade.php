@extends('layouts.owner_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(function() {
        // 新增特色
        $('.add-feature').click(function() {
            var featureInput = $('#feature-input');
            var feature = featureInput.val();
            if (feature) {
                // 將特色顯示成按鈕形式
				var newFeatureButton = '<div class="feature-input-group"><input type="hidden" name="features[]" value="' + feature + '"><button type="button" class="btn btn-outline-dark btn-sm feature-button">' + feature + '</button><button type="button" class="btn btn-outline-danger btn-sm delete-feature">刪除</button>&nbsp;<div>';
                $('.feature-list .input-group').append(newFeatureButton);
                // 清空輸入框
                featureInput.val('');
            }
        });

        // 刪除特色
        $(document).on('click', '.delete-feature', function() {
            $(this).prev().remove(); // 刪除特色按鈕
            $(this).prev().remove(); // 刪除隱藏的 input 元素
            $(this).remove(); // 刪除刪除按鈕
        });
    });

	$(function() {
		// 新增設備
		$('.add-furnish').click(function() {
			var furnishInput = $('#furnish-input');
			var furnish = furnishInput.val();
			if (furnish) {
				// 將設備顯示成 input 形式
				var newFurnishInput = $('<div class="furnish-input-group"><input type="hidden" name="furnishings[]" value="' + furnish + '"><button type="button" class="btn btn-outline-dark btn-sm">' + furnish + '</button><button type="button" class="btn btn-outline-danger btn-sm delete-furnish">刪除</button>&nbsp;</div>');
				$('.furnish-list .input-group').append(newFurnishInput);
				// 清空輸入框
				furnishInput.val('');
			}
		});

		// 刪除設備
		$(document).on('click', '.delete-furnish', function() {
			$(this).parent().remove(); // 刪除整個 div 包含設備 input 元素和刪除按鈕
		});
	});

	$(function() {
		// 設定計數器和圖片陣列
		var count = 0;
		var images = [];

		// 預覽現有圖片
		$('.preview-image').each(function() {
			var src = $(this).attr('src');
			if (src != '') {
				$(this).show();
			}
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
		// 刪除現有圖片
		$('.remove-existing-image').click(function() {
			  const imageContainer = $(this).parent();
			  imageContainer.remove();
		});
		// 刪除新圖片
		$('.remove-image').click(function() {
			  var index = $(this).closest('.image-container').index();
			  $(this).closest('.image-container').remove();
			  images.splice(index, 1);
		});
		$('.image-container').on('click', '.remove-image', function() {
			var inputGroup = $(this).parents('.input-group');
			var previewImage = inputGroup.prev('.preview-image');
			inputGroup.remove();
			previewImage.hide();
			if($('.preview-image:visible').length == 0){
				$('.preview-image-container').hide();
			}
		});

		// 新增圖片
		$('.add-image').click(function() {
			var html = '<div class="row image-container">' +
				'<div class="col-md-12">' +
				'<div class="preview-image-container">' +
				'<img class="preview-image" id="preview-image-' + count + '" src="" alt="預覽圖片" style="display: none; width: 100%; max-width: 300px; margin-top: 10px;">' +
				'</div>' +
				'<div class="input-group">' +
				'<input type="file" name="image[]" class="form-control">' +
				'<span class="input-group-addon">' +
				'<a href="#" class="remove-image"><i class="fa fa-remove"></i></a>' +
				'</span>' +
				'</div>' +
				'</div>' +
				'</div>';
			$('.add-more-container').before(html);
			count++;
		});

		$(document).ready(function() {
			  var count = 0;
			  var images = [];
		});

		// 送出表單時回傳圖片陣列
		$('form').submit(function() {
			console.log(images);
		});
	});

	$(document).ready(function() {
		// 綁定所有刪除按鈕的點擊事件
		$('.remove-existing-image').click(function() {
			// 取得被刪除的圖片容器元素
			const imageContainer = $(this).parent();
			// 從DOM中刪除圖片容器元素
			imageContainer.remove();
		});
	});

</script>

@section('page-content')
    <form method="POST" action="{{ route('owners.locations.houses.update', [$locations->id, $houses->id]) }}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
			<div class="location" style="padding: 20px;border: 1px solid #ccc;width:800px">
				<div class="row">
					<div class="left-column"><h2>{{ $locations->name }}</h2></div>
				</div>
				<div class="container" style="overflow-y: auto;padding: 20px;">
					<div class="row" style="white-space: nowrap;">
						<div class="col-md-3 item" style="margin-right: 5px;">
							@foreach($houses->image as $image)
								<div class="image-container" style="position: relative; display: inline-block;">
									<input type="hidden" name="images[]" value="{{ $image->image }}">
									<img src="{{ asset('image/'.$image->image) }}" alt="123" class="img-fluid">
									<button type="button" class="btn btn-danger remove-existing-image" style="position: absolute; top: 0; right: 0;"><i class="fa fa-remove"></i></button>
								</div>
							@endforeach
						</div>
					</div>
				</div>
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

				<div class="house row_create_house" style="padding: 20px;border: 1px solid #ccc;">
					<div class="row">
						<div class="left-column" style="width:22%;">房屋名稱</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="name" value="{{ $houses->name }}" required >
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">地址</div>
						<div class="right-column" style="width:78%;">
							<input type="text" name="address" value="{{ $houses->address }}" required>
						</div>
					</div><hr>
					<div class="row">
						<div class="left-column" style="width:22%;">介紹</div>
						<div class="right-column" style="width:78%;">
							<textarea name="introduce" rows="5" cols="50">{{ $houses->introduce }}</textarea>
						</div>
					</div><hr>

					<div class="row">
						<div class="first-column" style="width:22%;">租金</div>
						<div class="second-column" style="width:28%;">
							<input type="text" name="amount" style="width:100px"
								value="{{ $amount->value('amount') }}" pattern="[0-9]*" title="只能輸入數字">
						</div>
						<div class="third-column" style="width:22%;">繳納區間</div>
						<div class="fourth-column" style="width:28%;">
							<input type="text" name="interval" style="width:100px"
								value="{{ $amount->value('interval') }}" placeholder="月" pattern="[0-9]*" title="只能輸入數字">
						</div>
					</div><hr>

					<div class="row">
						<div class="first-column" style="width:22%;">可住人數</div>
						<div class="second-column" style="width:28%;">
							<input type="text" name="num_renter" style="width:100px"
								value="{{ $houses->num_renter }}" pattern="[0-9]*" title="只能輸入數字">
						</div>
						<div class="third-column" style="width:22%;">最短租期</div>
						<div class="fourth-column" style="width:28%;">
							<input type="text" name="min_period" style="width:100px"
								value="{{ $houses->min_period }}" placeholder="月">
						</div>
					</div><hr>

					<div class="row">
						<div class="first-column" style="width:22%;">格局</div>
						<div class="second-column" style="width:28%;">
							<input type="text" name="pattern" style="width:100px"
								value="{{ $houses->pattern }}" placeholder="房間數量">
						</div>
						<div class="third-column" style="width:22%;">坪數</div>
						<div class="fourth-column" style="width:28%;">
							<input type="text" name="size" style="width:100px"
								value="{{ $houses->size }}">
						</div>
					</div><hr>

					<div class="row">
						<div class="first-column" style="width:22%;">類型</div>
						<div class="second-column" style="width:28%;">
							<select name="type">
							    <option value="" disabled selected>--請選擇--</option>
								<option value="雅房" {{ $houses->type == '雅房' ? 'selected' : '' }}>雅房</option>
								<option value="分租套房" {{ $houses->type == '分租套房' ? 'selected' : '' }}>分租套房</option>
								<option value="獨立套房" {{ $houses->type == '獨立套房' ? 'selected' : '' }}>獨立套房</option>
								<option value="整層住家" {{ $houses->type == '整層住家' ? 'selected' : '' }}>整層住家</option>
							</select>
						</div>
						<div class="third-column" style="width:22%;">樓層</div>
						<div class="fourth-column" style="width:28%;">
							<input type="text" name="floor" style="width:100px" value="{{ $houses->floor }}">
						</div>
					</div><hr>

					<div class="row">
						<div class="left-column" style="width:22%;">設備</div>
						<div class="right-column" style="width:78%;">
							<div class="furnish-list">
								<div class="input-group">
									@foreach($furnish as $furnish)
										<div class="furnish-input-group">
											<input type="hidden" name="furnishings[]" value="{{ $furnish->furnish }}">
											<button type="button" class="btn btn-outline-dark btn-sm">
												{{ $furnish->furnish }}
											</button><button type="button" class="btn btn-outline-danger btn-sm delete-furnish">
												刪除
											</button>&nbsp;
										</div>
									@endforeach
								</div>
							</div>
							<div>
								<input type="text" name="furnish" id="furnish-input">
								<button type="button" class="btn btn-success btn-sm add-furnish">新增</button>
							</div>
						</div>
					</div><hr>

					<div class="row">
						<div class="left-column" style="width:22%;">特色</div>
						<div class="right-column" style="width:78%;">
							<div class="feature-list">
								<div class="input-group">
									@foreach($feature as $feature)
										<div class="furnish-input-group">
											<input type="hidden" name="features[]" value="{{ $feature->feature }}">
											<button type="button" class="btn btn-outline-dark btn-sm feature-button">
												{{ $feature->feature }}
											</button><button type="button" class="btn btn-outline-danger btn-sm delete-feature">
												刪除
											</button>&nbsp;
										</div>
									@endforeach
								</div>
							</div>
							<div>
								<input type="text" name="feature" id="feature-input">
								<button type="button" class="btn btn-success btn-sm add-feature">新增</button>
							</div>
						</div>
					</div><hr>

					<div class="row">
						<div class="left-column" style="width:50%;text-align:right">
							<button class="btn btn-primary" type="submit">
								修改
							</button>
						</div>
						<div class="center-column" style="width:50%;text-align:left">
							<a class="btn btn-danger" href="{{ route('owners.home.index',$owner_id) }}">返回</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
