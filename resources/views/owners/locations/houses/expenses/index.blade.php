@extends('layouts.owner_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '某一房屋下的費用')
@section('page-content')
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @foreach($houses as $house)
    <div class="from-group mb-3 px-3 py-2">
        <div class="left-column" style="width:90%;padding: 20px;"><h2>{{$house->name}}費用</h2></div>
    </div>
    @endforeach
    <div class="house" style="padding: 20px;border: 1px solid #ccc;">
        {{--    vv費用種類按鈕vv    --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark active" style="margin-left: 12px"
                        id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                        aria-disabled="true" type="button" role="tab" aria-controls="pills-all"
                        aria-selected="true">
                    全部
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="pills-for_rent-tab" data-bs-toggle="pill" data-bs-target="#pills-for_rent"
                        type="button" role="tab" aria-controls="pills-for_rent" aria-selected="false">
                    水費
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="pills-listed-tab" data-bs-toggle="pill" data-bs-target="#pills-listed"
                        type="button" role="tab" aria-controls="pills-listed" aria-selected="false">
                    電費
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                        type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                    房租
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                        type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                    其他費用
                </button>
            </li>
            <li class="py-2 px-3">||</li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark"
                        id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                        type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                    已繳費
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="pills-vacancy-tab" data-bs-toggle="pill" data-bs-target="#pills-vacancy"
                        type="button" role="tab" aria-controls="pills-vacancy" aria-selected="false">
                    未繳費
                </button>
            </li>
            <li class="py-2 px-3">||</li>
            <li class="nav-item" role="presentation">
                <a href="{{route('houses.expenses.create')}}"><button type="button" class="btn btn-primary">新增費用</button></a>
            </li>
        </ul>
        {{--    ^^費用種類按鈕^^    --}}

        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center;width: 10%">期間</th>
                            <th scope="col" style="text-align: center;width: 10%">費用類型</th>
                            <th scope="col" style="text-align: center;width: 10%">金額</th>
                            <th scope="col" style="text-align: center;width: 10%">狀態</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($houses as $key => $house)
                            @foreach($house->expenses as $expense)
                        <tr>
                            <td style="text-align: center">每 {{$expense->interval}} 個月繳交</td>
                            <td style="text-align: center">{{$expense->type}}</td>
                            <td style="text-align: center">{{$expense->amount}} 元</td>
                            <td style="text-align: center">還要關聯應繳款項</td>
                            <td style="text-align: right;width: 5%">
                                    @csrf
                                    <a class="btn btn-secondary" href="{{route('houses.expenses.edit',$expense -> id)}}">修改</a>
                            </td>
                            <td style="text-align: right;width: 3%">
                                <form action="{{route('houses.expenses.destroy',$expense -> id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">刪除</button>
                                </form></td>
                        </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
