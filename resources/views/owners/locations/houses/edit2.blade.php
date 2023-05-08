@extends('layouts.renter_master_index')
@section('title', '房東頁面-修改房屋')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
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
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房屋 /</span>修改房屋</h4>
                            <!-- Tabs -->
                            <form method="POST" action="{{ route('owners.locations.houses.update', [$locations->id, $houses->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="col-xl-8">
                                    <!-- HTML5 Inputs -->
                                    <div class="card mb-4">
                                        <div class="card-body">
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
                                                        <button class="btn btn-primary add-image" type="button"><i class="fa fa-plus"></i> 新增圖片</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="input-group mb-3">
                                                    {{--                            縣市地區選項--}}
                                                    <div role="tw-city-selector" class="my-style-selector"
                                                         data-county-value="{{ $houses->county }}"
                                                         data-district-value="{{ $houses->area }}"></div>
                                                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:8%">地址</span>
                                                    <input type="text" class="form-control" name="address" style="width:46%" value="{{ $houses->address }}"
                                                           required aria-describedby="inputGroup-sizing-default">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">介紹</span>
                                                    <textarea class="form-control" name="introduce" rows="5" cols="50"
                                                              aria-describedby="inputGroup-sizing-default">{{ $houses->introduce }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="first-column" style="width:50%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">每</span>
                                                        <select class="form-select" id="inputGroupSelect01" name="interval" style="text-align:center">
                                                            <option value="" disabled selected>--選擇區間--</option>
                                                            <option value="12" {{ $amount->value('interval') == '12' ? 'selected' : '' }}>年繳</option>
                                                            <option value="6" {{ $amount->value('interval') == '6' ? 'selected' : '' }}>半年繳</option>
                                                            <option value="3" {{ $amount->value('interval') == '3' ? 'selected' : '' }}>季繳</option>
                                                            <option value="1" {{ $amount->value('interval') == '1' ? 'selected' : '' }}>月繳</option>
                                                        </select>
                                                        <span class="input-group-text" id="inputGroup-sizing-default">一次</span>
                                                    </div>
                                                </div>
                                                <div class="second-column" style="width:40%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">租金</span>
                                                        <span class="input-group-text">$</span>
                                                        <input type="text" class="form-control" name="amount" value="{{ $amount->value('amount') }}"
                                                               aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="first-column" style="width:30%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">可住</span>
                                                        <input type="text" class="form-control" name="num_renter" value="{{ $houses->num_renter }}"
                                                               style="text-align:right" aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">人</span>
                                                    </div>
                                                </div>
                                                <div class="second-column" style="width:40%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">最短租</span>
                                                        <input type="text" class="form-control" name="min_period" value="{{ $houses->min_period }}"
                                                               style="text-align:right" aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">個月</span>
                                                    </div>
                                                </div>
                                                <div class="third-column" style="width:30%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">房間</span>
                                                        <input type="text" class="form-control" name="pattern" value="{{ $houses->pattern }}"
                                                               style="text-align:right" aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">間</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="first-column" style="width:30%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">房間</span>
                                                        <input type="text" class="form-control" name="size" value="{{ $houses->size }}"
                                                               style="text-align:right" aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">坪</span>
                                                    </div>
                                                </div>
                                                <div class="second-column" style="width:40%;">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">類型</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="type" style="text-align:center">
                                                            <option value="" disabled selected>--請選擇--</option>
                                                            <option value="雅房" {{ $houses->type == '雅房' ? 'selected' : '' }}>雅房</option>
                                                            <option value="分租套房" {{ $houses->type == '分租套房' ? 'selected' : '' }}>分租套房</option>
                                                            <option value="獨立套房" {{ $houses->type == '獨立套房' ? 'selected' : '' }}>獨立套房</option>
                                                            <option value="整層住家" {{ $houses->type == '整層住家' ? 'selected' : '' }}>整層住家</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="third-column" style="width:30%;">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">第</span>
                                                        <input type="text" class="form-control" name="floor"  value="{{ $houses->floor }}"
                                                               style="text-align:right" aria-describedby="inputGroup-sizing-default" pattern="[0-9]*" title="只能輸入數字">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">層</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="first-column" style="width:50%;">
                                                    <div class="input-group mb-3" style="height:20px;">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">設備</span>
                                                    </div>
                                                    <div>
                                                        @php
                                                            $furnish_array = [];
                                                            foreach ($furnish as $furnish) {
                                                                $furnish_array[] = $furnish->furnish;
                                                            }
                                                        @endphp
                                                        <div class="input-group mb-3" style="height:20px">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="冷氣"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ in_array('冷氣', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="冷氣">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="電風扇"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($furnish_array) && in_array('電風扇', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="電風扇">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="熱水器"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($furnish_array) && in_array('熱水器', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="熱水器">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="洗衣機"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($furnish_array) && in_array('洗衣機', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="洗衣機">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="冰箱"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($furnish_array) && in_array('冰箱', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="冰箱">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="網路"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($furnish_array) && in_array('網路', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="網路">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="furnishings[]" value="天然瓦斯"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($furnish_array) && in_array('天然瓦斯', $furnish_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="天然瓦斯">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="second-column" style="width:50%;">
                                                    <div class="input-group mb-3" style="height:20px;">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">特色</span>
                                                    </div>
                                                    <div>
                                                        @php
                                                            $feature_array = [];
                                                            foreach ($feature as $feature) {
                                                                $feature_array[] = $feature->feature;
                                                            }
                                                        @endphp
                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="可養寵物"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('可養寵物', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="可養寵物">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="可開伙"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('可開伙', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="可開伙">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="有管理員"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('有管理員', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="有管理員">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="垃圾代收"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('垃圾代收', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="垃圾代收">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="可報稅"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('可報稅', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="可報稅">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="可入籍"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('可入籍', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="可入籍">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="有車位"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('有車位', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="有車位">

                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="有電梯"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('有電梯', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="有電梯">
                                                        </div>

                                                        <div class="input-group mb-3" style="height:20px">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input mt-0" type="checkbox" name="features[]" value="有陽台"
                                                                       style="width:20px;transform: translate(50%, 10%);" {{ isset($feature_array) && in_array('有陽台', $feature_array) ? 'checked' : '' }}>
                                                            </div>
                                                            <input type="text" class="form-control" disabled value="有陽台">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <button type="submit" class="btn btn-info mx-3">修改</button>
                                    <a type="button" class="btn btn-secondary" href="{{ route('owners.locations.houses.show',[$owner_id, $locations->id]) }}">返回</a>
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
