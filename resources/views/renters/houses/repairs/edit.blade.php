@extends('layouts.renter_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '報修頁面')
@section('page-content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <form method="POST" action="{{route('renters.houses.repairs.update',$repairs->id)}}">
        @csrf
        @method('PATCH')
        <div class="house" style="padding: 20px;border: 1px solid #ccc;justify-content: center;display: flex;">
            <div class="location" style="padding: 20px;border: 1px solid #ccc;width:800px">
                <div class="row">
                    <div class="left-column"><h2>租客報修</h2></div>
                </div>
                <div class="house row_create" style="padding: 20px;border: 1px solid #ccc;">
                    <div class="row">
                        <div class="left-column" style="width:22%;">請選擇房屋：</div>
                        <div class="right-column" style="width:78%;">
                            <select class="custom-select"  name="house_id">
                                @foreach($houses as  $house)
                                    <option value="{{$house->id}}">{{$house->name}}</option>
                                @endforeach
                            </select></div>
                    </div>
                    <hr>
{{--                   <div class="row">
                        <div class="left-column" style="width:22%;">需維修的物品</div>
                        <div class="right-column" style="width:78%;">
                            <input type="text" name="name" required>
                        </div>
                    </div>
                    <hr>--}}
                    <div class="row">
                        <div class="left-column" style="width:22%;">說明</div>
                        <div class="right-column" style="width:78%;">
                            <textarea name="content" style="width:78%;"
                                      placeholder="請詳細說明需要維修的物品狀況">{{$repairs->content}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="left-column" style="width:50%;text-align:right">
                            <button class="btn btn-primary" type="submit">
                                更改
                            </button>
                        </div>
                        <div class="right-column" style="width:50%;text-align:left">
                            <a class="btn btn-secondary" href="{{route('renters.houses.show',$house_id)}}">
                                取消
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
