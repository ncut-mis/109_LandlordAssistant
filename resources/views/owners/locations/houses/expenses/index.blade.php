@extends('layouts.owner_master')
<link href="{{ 'css/house_index.css' }}" rel="stylesheet">
@section('title', '某一房屋下的費用')
@section('page-content')
    <div class="from-group mb-3 px-3 py-2">
        <div class="left-column" style="width:90%;padding: 20px;"><h2>{房屋名稱}費用</h2></div>
    </div>

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
        </ul>
        {{--    ^^費用種類按鈕^^    --}}

        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
