@extends('layouts.renter_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '報修頁面')
@section('page-content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="from-group mb-3 px-3 py-2">
        <div class="house" style="padding: 20px;border: 1px solid #ccc;">
            <label for="content" class="form-label"><h3>需要報修嗎?</h3></label>
            <a type="button" class="btn btn-dark btn-sm" href="{{route('renters.houses.repairs.create')}}">新增</a>
            <ul class="nav nav-house mb-3" id="house-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-dark active" style="margin-left: 12px"
                            id="repair-all-tab" data-bs-toggle="tab" data-bs-target="#repair-all" aria-expanded="true"
                            aria-disabled="true" type="button" role="tab" aria-controls="repair-all"
                            aria-selected="true">
                        全部
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                            id="repair-not-finshed-tab" data-bs-toggle="tab" data-bs-target="#repair-not-finshed"
                            type="button" role="tab" aria-controls="repair-not-finshed" aria-selected="false">
                        未維修
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                            id="conduct-tab" data-bs-toggle="tab" data-bs-target="#in-repair"
                            type="button" role="tab" aria-controls="in-repair" aria-selected="false">
                        維修中
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-dark" style="margin-left: 12px"
                            id="finshed-tab" data-bs-toggle="tab" data-bs-target="#repair-finsh"
                            type="button" role="tab" aria-controls="repair-finsh" aria-selected="false">
                        已維修
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active fade" id="repair-all" role="tabpanel"
                     style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                    @foreach ($houses as $key =>$house)
                        @if($key >= 1)
                            <hr>
                        @endif
                        <div class="row">
                            <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                                 aria-expanded="false" aria-controls="houses{{ $key }}"
                                 style="width:90%;padding: 20px;"><h2>{{ $house->name }}</h2></div>
                            <div class="right-column" style="width:10%;padding: 20px;">
                            </div>
                        </div>@foreach($house -> repairs as $repair)
                            <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;"
                                 id="houses{{ $key }}">
                                <div class="row">
                                    <div class="left-column" style="width:20%;padding: 20px;">
                                        內容：{{$repair -> content}}</div>
                                    <div class="right-column" style="width:70%;padding: 20px;">
                                        狀態：{{$repair -> status}}</div>
                                    <div class="btn-group" style="width:10%;padding: 20px;">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            更改
                                        </button>
                                        <ul class="dropdown-menu location" style="text-align:center;">
                                            <form action="{{route('renters.houses.repairs.edit',$repair -> id)}}"
                                                  method="GET">
                                                @csrf
                                                <li>
                                                    <button class="dropdown-item">修改內容</button>
                                                </li>
                                            </form>
                                            <form action="{{route('renters.houses.repairs.destroy',$repair -> id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <li>
                                                    <button class="dropdown-item">取消報修</button>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="tab-pane fade" id="repair-not-finshed" role="tabpanel"
                     style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                    @foreach ($unrepair as $key =>$unrepair)
                        @if($key >= 1)
                            <hr>
                        @endif
                        <div class="row">
                            <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                                 aria-expanded="false" aria-controls="houses{{ $key }}"
                                 style="width:90%;padding: 20px;"><h2>{{ $unrepair->name }}</h2></div>
                            <div class="right-column" style="width:10%;padding: 20px;">
                            </div>
                        </div>@foreach($unrepair -> repairs as $repair)
                            <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;"
                                 id="houses{{ $key }}">
                                <div class="row">
                                    <div class="left-column" style="width:20%;padding: 20px;">
                                        內容：{{$repair -> content}}</div>
                                    <div class="right-column" style="width:70%;padding: 20px;">
                                        狀態：{{$repair -> status}}</div>
                                    <div class="btn-group" style="width:10%;padding: 20px;">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            更改
                                        </button>
                                        <ul class="dropdown-menu location" style="text-align:center;">
                                            <form action="{{route('renters.houses.repairs.edit',$repair -> id)}}"
                                                  method="GET">
                                                @csrf
                                                <li>
                                                    <button class="dropdown-item">修改內容</button>
                                                </li>
                                            </form>
                                            <form action="{{route('renters.houses.repairs.destroy',$repair -> id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <li>
                                                    <button class="dropdown-item">取消報修</button>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="house-content tab-pane fade" id="in-repair" role="tabpanel"
                     style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                    @foreach ($inrepair as $key =>$inrepair)
                        @if($key >= 1)
                            <hr>
                        @endif
                        <div class="row">
                            <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                                 aria-expanded="false" aria-controls="houses{{ $key }}"
                                 style="width:90%;padding: 20px;"><h2>{{ $inrepair->name }}</h2></div>
                            <div class="right-column" style="width:10%;padding: 20px;">
                            </div>
                        </div>@foreach($inrepair -> repairs as $repair)
                            <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;"
                                 id="houses{{ $key }}">
                                <div class="row">
                                    <div class="left-column" style="width:20%;padding: 20px;">
                                        內容：{{$repair -> content}}</div>
                                    <div class="right-column" style="width:70%;padding: 20px;">
                                        狀態：{{$repair -> status}}</div>
                                    <div class="btn-group" style="width:10%;padding: 20px;">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            更改
                                        </button>
                                        <ul class="dropdown-menu location" style="text-align:center;">
                                            <form action="{{route('renters.houses.repairs.edit',$repair -> id)}}"
                                                  method="GET">
                                                @csrf
                                                <li>
                                                    <button class="dropdown-item">修改內容</button>
                                                </li>
                                            </form>
                                            <form action="{{route('renters.houses.repairs.destroy',$repair -> id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <li>
                                                    <button class="dropdown-item">取消報修</button>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="house-content tab-pane fade" id="repair-finsh" role="tabpanel"
                     style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                    @foreach ($finsh as $key =>$finsh)
                        @if($key >= 1)
                            <hr>
                        @endif
                        <div class="row">
                            <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                                 aria-expanded="false" aria-controls="houses{{ $key }}"
                                 style="width:90%;padding: 20px;"><h2>{{ $finsh->name }}</h2></div>
                            <div class="right-column" style="width:10%;padding: 20px;">
                            </div>
                        </div>@foreach($finsh -> repairs as $repair)
                            <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;"
                                 id="houses{{ $key }}">
                                <div class="row">
                                    <div class="left-column" style="width:20%;padding: 20px;">
                                        內容：{{$repair -> content}}</div>
                                    <div class="right-column" style="width:70%;padding: 20px;">
                                        狀態：{{$repair -> status}}</div>
                                    <div class="btn-group" style="width:10%;padding: 20px;">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            更改
                                        </button>
                                        <ul class="dropdown-menu location" style="text-align:center;">
                                            <form action="{{route('renters.houses.repairs.edit',$repair -> id)}}"
                                                  method="GET">
                                                @csrf
                                                <li>
                                                    <button class="dropdown-item">修改內容</button>
                                                </li>
                                            </form>
                                            <form action="{{route('renters.houses.repairs.destroy',$repair -> id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <li>
                                                    <button class="dropdown-item">取消報修</button>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
@endsection
