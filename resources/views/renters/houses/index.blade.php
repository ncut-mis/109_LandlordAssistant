@extends('layouts.renter_master')
<link href="{{ asset('css/house_index.css') }}" rel="stylesheet">
@section('title', '租客頁面')
@section('page-content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="from-group mb-3 px-3 py-2">
        <div class="house" style="padding: 20px;border: 1px solid #ccc;">
            <label for="content" class="form-label"><h3>房屋列表</h3></label>
            @foreach ($houses as $key =>$house)
                <div class="tab-pane show active fade" id="repair-all" role="tabpanel"
                     style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="repair-all-tab">
                    <div class="row">
                        <div class="left-column" data-bs-toggle="collapse" data-bs-target="#houses{{ $key }}"
                             aria-expanded="false" aria-controls="houses{{ $key }}"
                             style="width:20%;padding: 20px;"><h2>{{ $house->name }}</h2></div>
                        <div class="center-column" style="width:60%;padding: 30px;">
                            @foreach($house -> expenses as $expense)
                                租金：{{$expense -> amount}}元&emsp;&emsp;
                            @endforeach
                            @foreach($house -> contracts as $contract)
                                結束日期：{{$contract -> end_date}}
                            @endforeach
                        </div>
                        <div class="right-column" style="width:20%;padding: 20px;">
                            <button type="button" class="btn btn-outline-primary">
                                詳細資訊
                            </button>&emsp;
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    其他選項
                                </button>&emsp;
                                <ul class="dropdown-menu location" style="min-width:6.8rem">
                                    <form action=""
                                          method="GET">
                                        @csrf
                                        <li>
                                            <button class="dropdown-item">查看公告</button>
                                        </li>
                                    </form>
                                    <form action=""
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <li>
                                            <button class="dropdown-item">報修</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if($key >= 0)
                    <br>
                @endif
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection
