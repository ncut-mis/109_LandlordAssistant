@extends('layouts.master')
@section('title', '主頁')
@section('content')
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<link rel="stylesheet" href="/path/to/viewer.css" />
<script src="/path/to/viewer.js"></script>

<script>
    fetch('/upload', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // 上傳成功，顯示成功訊息
                alert(data.message);
            } else {
                // 上傳失敗，顯示錯誤訊息
                alert('上傳失敗：' + data.message);
            }
        })
        .catch(error => console.error(error));
    $(function(){
        $('.masonry').masonry({
            itemSelector: '.item'
        })});

</script>


    <!-- Section-->
<section class="py-5">
    <div class="container">
        <div class="row masonry">

            <form action="{{ route('houses.contracts.store', $house->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="pdf_file">PDF文件</label>
                    <input type="file" class="form-control-file" id="pdf_file" name="pdf_file">
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
            <div id="pdf-viewer"></div>

{{--            <a href="{{ asset() }}" target="_blank">預覽</a>--}}
        </div>
    </div>


</section>
@endsection
