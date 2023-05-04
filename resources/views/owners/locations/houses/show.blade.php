@extends('layouts.owner_master')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('title', '房東管理頁面')
@section('page-content')
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 10px;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 50%;
            transition: all .3s ease-in-out;
        }

        .scroll-to-top:hover {
            background-color: #eee;
            cursor: pointer;
        }

        .scroll-to-top i {
            font-size: 20px;
            color: #333;
        }
    </style>
    <script>
        function scrollToTop() {
            // 滾動到頁面頂部
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        //刪除跳窗
        function confirmDelete(event, houseId) {
            event.preventDefault(); // 防止表單預設提交行為
            const leaseStatus = event.target.getAttribute('data-lease-status');
            if (leaseStatus === "出租中") {
                alert("該房屋正在出租中，不能刪除");
            } else {
                if (confirm('確定要刪除嗎？')) {
                    document.getElementById('delete-form-' + houseId).submit(); // 提交表單
                }
            }
        }

    </script>

    {{-- 回到最上面的按鈕 --}}
    <button onclick="scrollToTop()" class="scroll-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <div class="row px-4 py-4">
        <div class=""><a class="btn btn-outline-secondary"
                         href="{{ route('owners.home.index',[$owner_id,$location->id]) }}">返回</a></div>
        <div style="width:90%;padding: 20px;">
            <h2 style="display: inline;">{{ $location->name }} </h2>
        </div>
        <div style="width:10%;padding: 20px;">
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    設定
                </button>
                <ul class="dropdown-menu location" style="text-align:center;">
                    <li><a class="dropdown-item" href="{{ route('owners.locations.edit',$location->id) }}">修改地點</a>
                    </li>
                    <li><a class="dropdown-item" href="#">刪除地點</a></li>
                    <li><a class="dropdown-item"
                           href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a></li>
                    <hr>
                    <li><a class="dropdown-item"
                           href="{{ route('owners.locations.posts.index',$location->id) }}">公告</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="house" style="padding: 20px;border: 1px solid #ccc;">
        <ul class="nav mb-3" id="house-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark active" style="margin-left: 12px"
                        id="house-all-tab" data-bs-toggle="tab" data-bs-target="#house-all" aria-expanded="true"
                        aria-disabled="true" type="button" role="tab" aria-controls="house-all"
                        aria-selected="true">
                    全部
                    <span class="badge rounded-pill bg-secondary">{{ count($houses) }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="house-for_rent-tab" data-bs-toggle="tab" data-bs-target="#house-for_rent"
                        type="button" role="tab" aria-controls="house-for_rent" aria-selected="false">
                    出租中
                    <span class="badge rounded-pill bg-secondary">{{ count($for_rent) }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="house-listed-tab" data-bs-toggle="tab" data-bs-target="#house-listed"
                        type="button" role="tab" aria-controls="house-listed" aria-selected="false">
                    已刊登
                    <span class="badge rounded-pill bg-secondary">{{ count($listed) }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-dark" style="margin-left: 12px"
                        id="house-vacancy-tab" data-bs-toggle="tab" data-bs-target="#house-vacancy"
                        type="button" role="tab" aria-controls="house-vacancy" aria-selected="false">
                    閒置
                    <span class="badge rounded-pill bg-secondary">{{ count($vacancy) }}</span>
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active fade" id="house-all" role="tabpanel"
                 style="padding: 20px;border: 1px solid #ccc;" aria-labelledby="house-all-tab">
                <div class="row">
                    @if(count($location->houses)>0)
                        <div class="row">
                            <div style="width:20%;padding: 15px;">房屋名稱</div>
                            <div style="width:30%;padding: 20px;">狀態</div>
                        </div>
                    @else
                        還沒有房屋哦
                    @endif
                    @foreach ($houses as $house)
                        <div class="row">
                            <div class="row_house">
                                <div class="column" style="width:20%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit; text-decoration: none;">
                                        {{ $house->name }} </a>
                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                        $house->min_period && $house->pattern && $house->size &&
                                        $house->type && $house->floor &&
                                        $house->expenses->filter(function ($expense) {
                                            return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                        })->count() !== 0 &&
                                        $house->image->whereNotNull('image')->count() !== 0 &&
                                        $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                        $house->features->whereNotNull('feature')->count() !== 0
                                    )
                                    @else
                                        <span class="badge btn-warning text-dark">
										資料不完整
									</span>
                                    @endif
                                </div>
                                <div class="column" style="width:30%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->lease_status }}</a>
                                </div>

                                <div class="column" style="width:15%">
                                    <form
                                        action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        @if ($house->lease_status == '閒置')
                                            <button type="submit" class="btn btn-warning" name="publish"
                                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                                    $house->min_period && $house->pattern && $house->size &&
                                                    $house->type && $house->floor &&
                                                    $house->expenses->filter(function ($expense) {
                                                        return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                                    })->count() !== 0 &&
                                                    $house->image->whereNotNull('image')->count() !== 0 &&
                                                    $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                                    $house->features->whereNotNull('feature')->count() !== 0
                                                    )
                                                    @else
                                                        disabled
                                                @endif
                                            >刊登
                                            </button>
                                        @elseif ($house->lease_status == '已刊登')
                                            <button type="submit" class="btn btn-danger" name="unpublish">取消刊登
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success" name="rent" disabled>出租中
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">編輯</button>
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                        method="POST" id="delete-form-{{ $house->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                        <button type="submit" class="btn btn-outline-danger"
                                                data-lease-status="{{ $house->lease_status }}"
                                                onclick="confirmDelete(event, {{ $house->id }})">刪除
                                        </button>
                                        {{--<button type="submit" class="btn btn-outline-danger" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                    </form>
                                </div>
                                <div class="column" style="width:15%;transform: translate(0%, -10%);">
                                    <a class="btn btn-primary"
                                       href="{{ route('owners.houses.show', $house->id) }}">進入房屋</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="house-for_rent" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;"
                 aria-labelledby="house-for_rent-tab">
                <div class="row">
                    @if(count($location->houses)>0)
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 15px;">房屋名稱</div>
                            <div class="right-column" style="width:30%;padding: 20px;">狀態</div>
                        </div>
                    @else
                        還沒有房屋哦
                    @endif
                    @foreach ($for_rent as $house)
                        <div class="row">
                            <div class="row_house">
                                <div class="column" style="width:20%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->name }} </a>
                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                        $house->min_period && $house->pattern && $house->size &&
                                        $house->type && $house->floor &&
                                        $house->expenses->filter(function ($expense) {
                                            return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                        })->count() !== 0 &&
                                        $house->image->whereNotNull('image')->count() !== 0 &&
                                        $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                        $house->features->whereNotNull('feature')->count() !== 0
                                    )
                                    @else
                                        <span class="badge btn-warning text-dark">
										資料不完整
									</span>
                                    @endif
                                </div>
                                <div class="column" style="width:30%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->lease_status }}</a>
                                </div>

                                <div class="column" style="width:15%">
                                    <form
                                        action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        @if ($house->lease_status == '閒置')
                                            <button type="submit" class="btn btn-warning" name="publish">刊登</button>
                                        @elseif ($house->lease_status == '已刊登')
                                            <button type="submit" class="btn btn-danger" name="unpublish">取消刊登
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success" name="rent" disabled>出租中
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">編輯</button>
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                        method="POST" id="delete-form-{{ $house->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                        <button type="submit" class="btn btn-outline-danger"
                                                data-lease-status="{{ $house->lease_status }}"
                                                onclick="confirmDelete(event, {{ $house->id }})">刪除
                                        </button>
                                        {{--<button type="submit" class="btn btn-outline-danger" onclick="confirmDelete(event)" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                    </form>
                                </div>
                                <div class="column" style="width:15%;transform: translate(0%, -10%);">
                                    <a class="btn btn-primary"
                                       href="{{ route('owners.houses.show', $house->id) }}">進入房屋</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="house-listed" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;"
                 aria-labelledby="house-listed-tab">
                <div class="row">
                    @if(count($location->houses)>0)
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 15px;">房屋名稱</div>
                            <div class="right-column" style="width:30%;padding: 20px;">狀態</div>
                        </div>
                    @else
                        還沒有房屋哦
                    @endif
                    @foreach ($listed as $house)
                        <div class="row">
                            <div class="row_house">
                                <div class="column" style="width:20%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->name }} </a>
                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                        $house->min_period && $house->pattern && $house->size &&
                                        $house->type && $house->floor &&
                                        $house->expenses->filter(function ($expense) {
                                            return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                        })->count() !== 0 &&
                                        $house->image->whereNotNull('image')->count() !== 0 &&
                                        $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                        $house->features->whereNotNull('feature')->count() !== 0
                                    )
                                    @else
                                        <span class="badge btn-warning text-dark">
										資料不完整
									</span>
                                    @endif
                                </div>
                                <div class="column" style="width:30%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->lease_status }}</a>
                                </div>

                                <div class="column" style="width:15%">
                                    <form
                                        action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        @if ($house->lease_status == '閒置')
                                            <button type="submit" class="btn btn-warning" name="publish">刊登</button>
                                        @elseif ($house->lease_status == '已刊登')
                                            <button type="submit" class="btn btn-danger" name="unpublish">取消刊登
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success" name="rent" disabled>出租中
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">編輯</button>
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                        method="POST" id="delete-form-{{ $house->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                        <button type="submit" class="btn btn-outline-danger"
                                                data-lease-status="{{ $house->lease_status }}"
                                                onclick="confirmDelete(event, {{ $house->id }})">刪除
                                        </button>
                                        {{--<button type="submit" class="btn btn-outline-danger" onclick="confirmDelete(event)" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                    </form>
                                </div>
                                <div class="column" style="width:15%;transform: translate(0%, -10%);">
                                    <a class="btn btn-primary"
                                       href="{{ route('owners.houses.show', $house->id) }}">進入房屋</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="house-vacancy" role="tabpanel" style="padding: 20px;border: 1px solid #ccc;"
                 aria-labelledby="house-vacancy-tab">
                <div class="row">
                    @if(count($location->houses)>0)
                        <div class="row">
                            <div class="left-column" style="width:20%;padding: 15px;">房屋名稱</div>
                            <div class="right-column" style="width:30%;padding: 20px;">狀態</div>
                        </div>
                    @else
                        還沒有房屋哦
                    @endif
                    @foreach ($vacancy as $house)
                        <div class="row">
                            <div class="row_house">
                                <div class="column" style="width:20%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->name }} </a>
                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                        $house->min_period && $house->pattern && $house->size &&
                                        $house->type && $house->floor &&
                                        $house->expenses->filter(function ($expense) {
                                            return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                        })->count() !== 0 &&
                                        $house->image->whereNotNull('image')->count() !== 0 &&
                                        $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                        $house->features->whereNotNull('feature')->count() !== 0
                                    )
                                    @else
                                        <span class="badge btn-warning text-dark">
										資料不完整
									</span>
                                    @endif
                                </div>
                                <div class="column" style="width:30%">
                                    <a href="{{ route('owners.houses.show', $house->id) }}"
                                       style="color: inherit;  text-decoration: none;">
                                        {{ $house->lease_status }}</a>
                                </div>

                                <div class="column" style="width:15%">
                                    <form
                                        action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        @if ($house->lease_status == '閒置')
                                            <button type="submit" class="btn btn-warning" name="publish">刊登</button>
                                        @elseif ($house->lease_status == '已刊登')
                                            <button type="submit" class="btn btn-danger" name="unpublish">取消刊登
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success" name="rent" disabled>出租中
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">編輯</button>
                                    </form>
                                </div>
                                <div class="column">
                                    <form
                                        action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                        method="POST" id="delete-form-{{ $house->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                        <button type="submit" class="btn btn-outline-danger"
                                                data-lease-status="{{ $house->lease_status }}"
                                                onclick="confirmDelete(event, {{ $house->id }})">刪除
                                        </button>
                                        {{--<button type="submit" class="btn btn-outline-danger" onclick="confirmDelete(event)" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                    </form>
                                </div>
                                <div class="column" style="width:15%;transform: translate(0%, -10%);">
                                    <a class="btn btn-primary"
                                       href="{{ route('owners.houses.show', $house->id) }}">進入房屋</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
