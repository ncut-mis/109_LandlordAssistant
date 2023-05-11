@extends('layouts.renter_master_index')
@section('title', '房東頁面-新增房屋')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
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
        $(document).on('click', '.remove-image', function() {
            var index = $(this).closest('.image-container').index();
            $(this).closest('.image-container').remove();
            images.splice(index, 1);
        });
        // $('.remove-image').click(function() {
        //     var index = $(this).closest('.image-container').index();
        //     $(this).closest('.image-container').remove();
        //     images.splice(index, 1);
        // });
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
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main>
        <div class="layout-wrapper layout-content-navbar  ">
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /</span>新增房屋</h4>
                            <!-- Tabs -->
                            <form method="post" action="{{ route('owners.locations.houses.store',$locations->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="col-xl-8">
                                    <!-- HTML5 Inputs -->
                                    <div class="card mb-4">
                                        <div class="card-body">
											<div class="mb-3 row">
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
													<button class="btn btn-primary add-image" type="button"><i class="fa fa-plus"></i>新增圖片</button>
												  </div>
												</div>
											</div>
                                            <div class="mb-3 row">
                                                <div class="input-group mb-3">
													<span class="input-group-text" id="inputGroup-sizing-default">房屋名稱</span>
													<input type="text" class="form-control" name="name"
														required aria-describedby="inputGroup-sizing-default">
												</div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="input-group mb-3">
                                                    {{--                            縣市地區選項--}}
                                                    <div class="input-group mb-3">
														<div role="tw-city-selector" class="my-style-selector"></div>
														<span class="input-group-text" id="inputGroup-sizing-default" style="width:8%">地址</span>
														<input type="text" class="form-control" name="address" style="width:46%"
															   required aria-describedby="inputGroup-sizing-default">
													</div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="input-group mb-3">
													<span class="input-group-text" id="inputGroup-sizing-default">介紹</span>
													<textarea class="form-control" name="introduce" rows="5" cols="50"
														aria-describedby="inputGroup-sizing-default"></textarea>
												</div>
                                            </div>
                                            <div class="mb-3 row">
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
														<input type="text" class="form-control" name="rentals"
															aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
													</div>
												</div>
                                            </div>

                                            <div class="mb-3 row">
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

                                            <div class="mb-3 row">
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

                                            <div class="mb-3 row">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
									<button class="btn btn-info" type="submit" name="unpublish" value="閒置" onclick="validateAndSubmit()">
										儲存
									</button>
									<button class="btn btn-danger" type="submit" name="publish" value="已刊登">
										刊登房屋
									</button>
									<a class="btn btn-secondary text-center" href="{{ route('owners.locations.houses.show',[$owner_id, $locations->id]) }}">返回</a>
                            </form>
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
