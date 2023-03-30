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
                        id="conduct-tab" data-bs-toggle="tab" data-bs-target="#house-listed"
                        type="button" role="tab" aria-controls="house-listed" aria-selected="false">
                    維修中
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="finshed-tab" data-bs-toggle="tab" data-bs-target="#house-vacancy"
                        type="button" role="tab" aria-controls="house-vacancy" aria-selected="false">
                    已維修
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active fade" id="repair-all" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                @foreach ($houses as $key =>$house)
                    @if($key >= 1)
                        <hr>
                    @endif

                    <div class="row">
                        <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                             aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $house->name }}</h2></div>
                        <div class="right-column" style="width:10%;padding: 20px;">
                        </div>
                    </div>@foreach($house -> repairs as $repair)
                    <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 20px;">內容：{{$repair -> content}}</div>
                            <div class="right-column" style="width:70%;padding: 20px;">狀態：{{$repair -> status}}</div>
                            <div class="btn-group" style="width:10%;padding: 20px;">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    更改
                                </button>
                                <ul class="dropdown-menu location" style="text-align:center;">
                                    <form action="{{route('renters.houses.repairs.edit',$repair -> id)}}" method="GET">
                                        @csrf
                                    <li><button class="dropdown-item">修改內容</button></li>
                                    </form>
                                    <form action="{{route('renters.houses.repairs.destroy',$repair -> id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <li><button class="dropdown-item" >取消報修</button></li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endforeach
            </div>
            <div class="tab-pane fade" id="repair-not-finshed" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-not-finshed-tab">
                @foreach ($for_rent as $key =>$location)
                    @if($key >= 1)
                        <hr>
                    @endif
                    <div class="row">
                        <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                             aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
                        <div class="right-column" style="width:10%;padding: 20px;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    按鈕
                                </button>
                                <ul class="dropdown-menu location" style="text-align:center;">
                                    <li><a class="dropdown-item" href="#">修改地點</a></li>
                                    <li><a class="dropdown-item" href="#">刪除地點</a></li>
                                    <li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">公告</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
                            <div class="right-column" style="width:80%;padding: 20px;">狀態</div>
                        </div>
                        @foreach ($location->houses as $house)
                            <div class="row">
                                <div class="row_house">
                                    <div class="column">{{ $house->name }}</div>
                                    <div class="column">放狀態</div>
                                    <div class="column">
                                        <form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary">編輯</button>
                                        </form>
                                    </div>
                                    <div class="column">
                                        <form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">刪除</button>
                                        </form>
                                    </div>
                                    <div class="column">
                                        <button class="btn btn-primary" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
                                                aria-controls="collapseWidthExample{{ $house->id }}">
                                            按鈕
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
                                    <div class="collapsed-content">
                                        <div class="row">
                                            <div class="column">期間</div>
                                            <div class="column">費用類型</div>
                                            <div class="column">總金額</div>
                                            <div class="column">狀態</div>
                                        </div>
                                        <div class="row_list">
                                            <div class="column">1</div>
                                            <div class="column">2</div>
                                            <div class="column">456</div>
                                            <div class="column">456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="house-content tab-pane fade" id="house-listed" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="conduct-tab">
                @foreach ($listed as $key =>$location)
                    @if($key >= 1)
                        <hr>
                    @endif
                    <div class="row">
                        <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                             aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
                        <div class="right-column" style="width:10%;padding: 20px;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    按鈕
                                </button>
                                <ul class="dropdown-menu location" style="text-align:center;">
                                    <li><a class="dropdown-item" href="#">修改地點</a></li>
                                    <li><a class="dropdown-item" href="#">刪除地點</a></li>
                                    <li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">公告</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
                            <div class="right-column" style="width:80%;padding: 20px;">狀態</div>
                        </div>
                        @foreach ($location->houses as $house)
                            <div class="row">
                                <div class="row_house">
                                    <div class="column">{{ $house->name }}</div>
                                    <div class="column">放狀態</div>
                                    <div class="column">
                                        <form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary">編輯</button>
                                        </form>
                                    </div>
                                    <div class="column">
                                        <form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">刪除</button>
                                        </form>
                                    </div>
                                    <div class="column">
                                        <button class="btn btn-primary" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
                                                aria-controls="collapseWidthExample{{ $house->id }}">
                                            按鈕
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
                                    <div class="collapsed-content">
                                        <div class="row">
                                            <div class="column">期間</div>
                                            <div class="column">費用類型</div>
                                            <div class="column">總金額</div>
                                            <div class="column">狀態</div>
                                        </div>
                                        <div class="row_list">
                                            <div class="column">1</div>
                                            <div class="column">2</div>
                                            <div class="column">456</div>
                                            <div class="column">456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="house-content tab-pane fade" id="house-vacancy" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="finshed-tab">
                @foreach ($vacancy as $key =>$location)
                    @if($key >= 1)
                        <hr>
                    @endif
                    <div class="row">
                        <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                             aria-expanded="false" aria-controls="houses{{ $key }}" style="width:90%;padding: 20px;"><h2>{{ $location->name }}</h2></div>
                        <div class="right-column" style="width:10%;padding: 20px;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    按鈕
                                </button>
                                <ul class="dropdown-menu location" style="text-align:center;">
                                    <li><a class="dropdown-item" href="#">修改地點</a></li>
                                    <li><a class="dropdown-item" href="#">刪除地點</a></li>
                                    <li><a class="dropdown-item" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">公告</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fade tab-pane collapse" style="padding: 20px;border: 1px solid #ccc;" id="houses{{ $key }}">
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 20px;">房屋名稱</div>
                            <div class="right-column" style="width:80%;padding: 20px;">狀態</div>
                        </div>
                        @foreach ($location->houses as $house)
                            <div class="row">
                                <div class="row_house">
                                    <div class="column">{{ $house->name }}</div>
                                    <div class="column">放狀態</div>
                                    <div class="column">
                                        <form action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary">編輯</button>
                                        </form>
                                    </div>
                                    <div class="column">
                                        <form action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">刪除</button>
                                        </form>
                                    </div>
                                    <div class="column">
                                        <button class="btn btn-primary" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $house->id }}" aria-expanded="false"
                                                aria-controls="collapseWidthExample{{ $house->id }}">
                                            按鈕
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse collapse-horizontal" id="collapseWidthExample{{ $house->id }}">
                                    <div class="collapsed-content">
                                        <div class="row">
                                            <div class="column">期間</div>
                                            <div class="column">費用類型</div>
                                            <div class="column">總金額</div>
                                            <div class="column">狀態</div>
                                        </div>
                                        <div class="row_list">
                                            <div class="column">1</div>
                                            <div class="column">2</div>
                                            <div class="column">456</div>
                                            <div class="column">456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
