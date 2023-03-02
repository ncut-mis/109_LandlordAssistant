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
    <form action="#" method="POST">
        @method('POST')
        @csrf
        <label for="input">新增出租地點：</label>
        <input type="text" id="input" name="input">
        <button type="button">儲存</button>
    </form>
    <button >頁面1</button>
    <button >頁面1</button>
    <button >頁面1</button>
    <button >頁面1</button>


@endsection


