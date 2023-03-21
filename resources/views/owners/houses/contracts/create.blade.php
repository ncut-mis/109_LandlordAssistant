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
        <div class="row masonry">
{{--            需要改寫成迴圈型態顯示圖片--}}
{{--            @foreach()--}}
            <div class="col-md-3 item">
                <img src="image/4211228.jpg" alt="123" class="img-responsive">
            </div>
            <div class="col-md-3">
                <img src="02.jpg" alt="456" class="img-responsive">
            </div>
            <div class="col-md-3">
                <img src="03.jpg" alt="789" class="img-responsive">
            </div>
        </div>

        <header class="bg-dark py-5">
            <div class="css_table px-4 px-lg-5 my-5" style="display:table;width:90%; border-top:none">
                <div class="css_tr text-white" style="display:table-row;">
                    <div class="css_td display-4 fw-bolder" style="display:table-cell">
                        標題
                        <hr>
                    </div>
                    <div class="css_td lead fw-normal text-white-50 mb-0" style="display:table-cell">
                        房東名
                    </div>
                </div>
                <div class="css_tr text-white" style="display:table-row">
                    <div class="css_td display-6" style="display:table-cell">
                        <button type="button" class="btn btn-outline-light btn-sm">有車位</button>
                        <button type="button" class="btn btn-outline-light btn-sm">有陽台</button>
                        <hr>
                    </div>
                    <div class="css_td lead fw-normal text-white-50 mb-0" style="display:table-cell">
                        聯絡方式1:
                    </div>
                </div>
                <div class="css_tr text-white" style="display:table-row">
                    <div class="css_td display-8" style="display:table-cell">
                        <span class="fs-4" style="color: #ef4444">9,999　</span>元/月
                        <hr>
                    </div>
                    <div class="css_td lead fw-normal text-white-50 mb-0" style="display:table-cell">
                        聯絡方式2:
                    </div>
                </div>
                <div class="css_tr text-white" style="display:table-row">
                    <div class="css_td display-6" style="display:table-cell">
                        <button type="button" class="btn btn-outline-light btn-sm">冰箱</button>
                        <button type="button" class="btn btn-outline-light btn-sm">洗衣機</button>

                    </div>
                </div>
            </div>
        </header>
    </div>

</section>
@endsection
