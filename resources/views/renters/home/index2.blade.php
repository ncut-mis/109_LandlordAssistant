@extends('layouts.master')
@section('title', '主頁')
@section('content')

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    $(function(){
        $('.masonry').masonry({
            itemSelector: '.item'
        })});

</script>


    <!-- Section-->
<section class="py-5">

    <div class="container">
        <header class="bg-dark py-5">
            <div class="css_table" style="display:table">
                <div class="row" style="display:table-row;">
                    <div class="col fw-normal"
                         style="display:table-cell;border-collapse: collapse;width:85%; border-top:none">
                        <div class="btn-group btn-group-lg" style="margin-left: 12px" role="group"
                             aria-label="Basic checkbox toggle button group">
                            {{--                    <p>--}}
                            {{--                        <button type="button" class="btn btn-outline-light" style="margin-left: 12px" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">房屋資訊</button>--}}
                            {{--                    </p>--}}

                            {{--                    <button type="button" class="btn btn-outline-light" style="margin-left: 12px">公告</button>--}}
                            {{--                    <button type="button" class="btn btn-outline-light" style="margin-left: 12px">信件</button>--}}
                            {{--                    <button type="button" class="btn btn-outline-light" style="margin-left: 12px">合約</button>--}}
                            {{--                    <button type="button" class="btn btn-outline-light" style="margin-left: 12px">費用</button>--}}
                            {{--                    <button type="button" class="btn btn-outline-light" style="margin-left: 12px">維修</button>--}}

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-light active" style="margin-left: 12px"
                                            id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-house"
                                            aria-disabled="true" type="button" role="tab" aria-controls="pills-house"
                                            aria-selected="true">
                                        房屋資訊
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-light" style="margin-left: 12px"
                                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-post"
                                            type="button" role="tab" aria-controls="pills-post" aria-selected="false">
                                        公告
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-light" style="margin-left: 12px"
                                            id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-pack"
                                            type="button" role="tab" aria-controls="pills-pack" aria-selected="false">
                                        信件
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-light" style="margin-left: 12px"
                                            id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-contract" type="button" role="tab"
                                            aria-controls="pills-contract" aria-selected="false">
                                        合約
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-light" style="margin-left: 12px"
                                            id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-cost"
                                            type="button" role="tab" aria-controls="pills-cost" aria-selected="false">
                                        費用
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-outline-light" style="margin-left: 12px"
                                            id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-repair"
                                            type="button" role="tab" aria-controls="pills-repair" aria-selected="false">
                                        維修
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" style="background-color:white;margin-left: 30px;margin-right: 36px"
                             id="pills-tabContent">
                            <div class="tab-pane fade show active  display-6" id="pills-house" role="tabpanel"
                                 aria-labelledby="pills-house-tab">
                                <ul style="list-style-type: none">
                                    <li>提供設備</li>
                                    <li>多久繳一次</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="pills-post" role="tabpanel" aria-labelledby="pills-post-tab">
                                222
                            </div>
                            <div class="tab-pane fade" id="pills-pack" role="tabpanel" aria-labelledby="pills-pack-tab">
                                333
                            </div>
                            <div class="tab-pane fade" id="pills-contract" role="tabpanel"
                                 aria-labelledby="pills-contract-tab">
                                444
                            </div>
                            <div class="tab-pane fade" id="pills-cost" role="tabpanel" aria-labelledby="pills-cost-tab">
                                555
                            </div>
                            <div class="tab-pane fade" id="pills-repair" role="tabpanel"
                                 aria-labelledby="pills-repair-tab">
                                666
                            </div>
                        </div>
                    </div>
                    <div class="col display-6 fw-normal text-white-50"
                         style="display:table-cell;border-collapse: collapse;">
                        房東資料<br>
                        test
                    </div>
                </div>
            </div>
        </header>
    </div>

</section>
@endsection
