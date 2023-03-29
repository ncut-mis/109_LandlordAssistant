@extends('layouts.owner_master')
<link href="{{ 'css/house_index.css' }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')

    @foreach($houses as $house)
        <div class="from-group mb-3 px-3 py-2">
            <div class="text-center fw-bolder fs-4">新增{{$house->name}}費用</div>
        </div>
    @endforeach
    <form method="post" action="{{ route('houses.expenses.store') }}">
        @csrf
        <div class="house" style="padding: 20px;border: 1px solid #ccc;display: block;">

            <div class="row mb-3">
                <label for="inputState" class="col-sm-6 col-form-label">費用類型</label>
                <div class="col-sm-7">
                <select name="type" class="form-select">
                    <option selected value="水費">水費</option>
                    <option value="電費">電費</option>
                    <option value="房租">房租</option>
                    <option value="其他費用">其他費用</option>
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-6 col-form-label">金額</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="amount">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-6 col-form-label">每次繳費期間(單位: 月)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="interval">
                </div>
            </div>

            <div class="left-column" style="text-align:left">
                <button class="btn btn-primary" type="submit">
                    新增費用
                </button>
            </div>
        </div>
    </form>

@endsection
