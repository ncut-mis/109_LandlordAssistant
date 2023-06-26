@extends('layouts.master')
@section('title', '首頁')
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
    <style>
        /* tw-city 替換適合的 css 樣式 */
        .my-style-selector select {
            font-size: 20px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-color: #a1cd9b;
            border-width: 2px;
            border-radius: 1em;
            color: rgba(6, 61, 9, 0.34);
            outline: none;
            padding: .3em 1.25em;
        }

        input[type=text1] {
            width: 400px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 1em;
            font-size: 16px;
            background-color: white;
            background-image: url('image/search.png');
            background-position: 10px 13px;
            background-size: 27px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            transition: width 0.4s ease-in-out;
        }

        .text-truncate {
            overflow: hidden;
            max-height: 6rem;
            line-height: 1.5rem;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            text-overflow: ellipsis;
            display: block;
        }

        .text-truncate2 {
            overflow: hidden;
            max-height: 1.5rem;
            line-height: 2rem;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            text-overflow: ellipsis;
            display: block;
        }

        .custom-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        /* 去除原生的checkbox樣式 */
        input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #a1cd9b;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
        }

        /* 定義勾選狀態的樣式 */
        input[type="checkbox"]:checked {
            background-color: #a1cd9b;
        }

        form div {
            display: inline-block;
            margin-right: 10px;
        }

        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .checkbox-container > div {
            margin-right: 10px;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 5px;
        }
        .county,
        .district {
            font-size: 14px;
            width: 200px;
            height: 60px;
            display: inline-block;
            vertical-align: middle;
            line-height: 60px; /* 與元素高度相同的值，或進行微調 */
            /* 其他自訂的 CSS 樣式 */
        }
    </style>




    <!-- Banner -->
    @if(isset($lastSystemPost))
        <div class="custom-modal" id="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">系統公告提醒</h5>
                    </div>
                    <div class="modal-body">
                        <p>{{ $lastSystemPost->content }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal()">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function closeModal() {
                var modal = document.getElementById('post');
                modal.style.display = 'none';
            }
        </script>
    @endif
    <form method="post" action="{{ route('houses.search') }}" enctype="multipart/form-data" style="padding: 0; margin: 0; border: none;">
        @csrf

        <section id="banner">
{{--            <label for="air-conditioner" style="font-size: 25px;">附加條件 </label>--}}
            <div class="checkbox-container">
                <div>
                    <input type="checkbox" id="air-conditioner" name="furnishings1" value="冷氣">
                    <label for="air-conditioner">冷氣</label>
                </div>
                <div>
                    <input type="checkbox" id="refrigerator" name="furnishings2" value="冰箱">
                    <label for="refrigerator">冰箱</label>
                </div>
                <div>
                    <input type="checkbox" id="washing-machine" name="furnishings3" value="洗衣機">
                    <label for="washing-machine">洗衣機</label>
                </div>
                <div>
                    <input type="checkbox" id="internet" name="furnishings4" value="網路">
                    <label for="internet">網路</label>
                </div>
                <div>
                    <input type="checkbox" id="internet" name="features1" value="可養寵物">
                    <label for="internet">可養寵物</label>
                </div>
                <div>
                    <input type="checkbox" id="internet" name="features2" value="可開伙">
                    <label for="internet">可開伙</label>
                </div>
                <div>
                    <input type="checkbox" id="internet" name="features3" value="有車位">
                    <label for="internet">有車位</label>
                </div>
                <div>
                    <input type="checkbox" id="internet" name="features4" value="有電梯">
                    <label for="internet">有電梯</label>
                </div>
                <div>
                    <input type="checkbox" id="internet" name="features5" value="有管理員">
                    <label for="internet">有管理員</label>
                </div>
                <div>
                    <label for="internet"></label>
                </div><div>
                    <label for="internet"></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div role="tw-city-selector" class="my-style-selector"></div>
                </div>
                <div class="col">
                    <input type="text1" placeholder="搜尋名稱" aria-label="Last name" name="selecthouse">
                    <button class="btn" type="submit" id="button-addon2">搜尋</button>
                </div>
            </div>

        </section>
    </form>







<!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row gtr-200">


                <div class="col-12">

                    <!-- Features -->
                    <section class="box features">
                        @if(Session::has('search_result'))
                            <h2 class="major"><span>搜尋結果如下...顯示所有房屋請點租屋網</span></h2>

                        @else
                            <h2 class="major"><span>你可能會喜歡...</span></h2>
                            <!-- 顯示默認的首頁內容 -->
                        @endif
                        <!-- 顯示租屋公告 -->
{{--                        @if ($housepost)--}}
{{--                            <div class="alert alert-info">--}}
{{--                                租屋新公告：{{ $housepost->title }}--}}
{{--                                <a href="{{ route('renters.houses.posts.show', [$houses->id, $housepost->id]) }}" class="btn btn-primary">查看詳情</a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <div class="row">
                            @foreach ($houses as $house)
                                @if($house->lease_status == '已刊登')
                                    <div class="col-3 col-6-medium col-12-small">

                                        <!-- Feature -->
                                        <section class="box feature">
                                            @foreach($house->image as $image)
                                                @if($loop->first)
                                                <a href="{{ route('houses.show', $house->id) }}" class="image featured"><img
                                                        src="image/{{ $image->image }}" alt=""/></a>

                                                @endif
                                            @endforeach
                                            <div class="col-2 text-truncate2">
                                                <h3>
                                                    <a href="{{ route('houses.show', $house->id) }}">{{ $house->county }}
                                                        |{{ $house->name }}</a>
                                                </h3>
                                            </div>
                                            <div class="col-2 text-truncate">
                                                <p>
                                                    {{ $house->introduce }}
                                                </p>
                                            </div>
                                        </section>

                                    </div>
                        @endif
                        @endforeach
                    </section>

                </div>
            </div>
        </div>
    </section>














@endsection
