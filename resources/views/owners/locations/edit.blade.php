@extends('layouts.owner_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>



@section('page-content')
    <form method="post" action="{{ route('owners.locations.update',$location->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="from-group mb-3 px-3 py-2">
            <label for="content" class="form-label">修改地點名稱</label>
            <input type="text" class="input-group-sm" name="name" value="{{$name}}" style="width:20%" required>
            <button type="submit" class="btn btn-dark btn-sm">確定</button>
        </div>
    </form>

@endsection
