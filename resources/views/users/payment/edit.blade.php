@extends('layouts.master')
@section('title', '個人資料')
@section('content')
<header class="py-0">
    <div class="px-4 py-3 text-dark">
    </div>
</header>
{{--    <table style="margin: 0 auto;">--}}
<form method="POST" action="{{ route('users.payment.update', $user_id) }}">
    @csrf
    @method('PATCH')
    <div class="main bg-dark py-5 text-light">
        <div class="container my-5">
            <div class="col-span-5 bg-dark text-light py-2 mx-1 border-0 px-1 fs-3" style="border: 0; display: flex; justify-content: center; align-items: center; font-weight: bold;">
                收付款方式
            </div>
        </div>
        <div class="row center fw-bolder" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-3 center">
                    銀行帳戶
            </div>
            <div class="col-3 center">
                    銀行帳號
            </div>
        </div>
        <div class="row center fw-bolder" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-3" style="display: flex; justify-content: center; align-items: center;">
                <input type="text" class="form-control" name="account_name" style="width: 50%;text-align:center"
                       aria-describedby="inputGroup-sizing-default" value="{{$account_name}}">
            </div>
            <div class="col-3 center" style="display: flex; justify-content: center; align-items: center;">
                <input type="text" class="form-control" name="account" style="width: 50%;text-align:center"
                       aria-describedby="inputGroup-sizing-default" value="{{$account}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 center">
                <button class="btn btn-light btn-sm" type="submit">
                    儲存
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
