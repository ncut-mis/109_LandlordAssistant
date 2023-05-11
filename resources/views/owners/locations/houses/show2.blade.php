@extends('layouts.owner_master_index')
@section('title', '房東頁面')
@section('page-content')
{{--    @if(Session::has('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ Session::get('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}
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
    @if(session('yes'))
        <div class="alert alert-success">
            {{ session('yes') }}
        </div>

    @elseif (session('no'))
        <div class="alert alert-danger">
            {{ session('no') }}
        </div>
    @endif
    <main>
        <div class="layout-wrapper">
            <div class="layout-container">
                <!-- Menu -->
                <!-- / Menu -->
                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <!-- / Navbar -->
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h2 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">房東 /</span>首頁</h2>
                            <!-- Collapse -->
                            <div class="row">
								<div class="col-7" style="display: inline-block;"><h3>房屋資訊</h3></div>
								<div class="col-5" style="display: inline-block;">
									<a class="btn btn-outline-secondary" href="{{ route('owners.home.index',[$owner_id,$location->id]) }}">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
										  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
										  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
										</svg>
									</a>
									<a class="btn btn-secondary" href="{{ route('owners.locations.edit',$location->id) }}">修改地點</a>
{{--									@if (session('success'))--}}
{{--										<div class="alert alert-success">--}}
{{--											{{ session('success') }}--}}
{{--										</div>--}}
{{--									@endif--}}
									<a class="btn btn-danger" href="{{ route('owners.locations.destroy', $location->id) }}"
									   onclick="event.preventDefault();
								if(confirm('確定要刪除這個地點嗎？底下房屋都會消失喔!!')) {
								  document.getElementById('delete-form').submit();
								}">
										刪除地點
									</a>
									|
									<a class="btn btn-primary" href="{{ route('owners.locations.houses.create',$location->id) }}">加入房屋</a>
									<a class="btn btn-warning" href="{{ route('owners.locations.posts.index',$location->id) }}">公告</a>

								</div>
							</div>
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
                                <div class="tab-pane show active fade" id="house-all" role="tabpanel" aria-labelledby="house-all-tab">
                                    <div class="row">
                                        @foreach ($houses as $house)
                                        <div class="col-12">
                                            <div class="card mb-4">
                                                <h3 class="card-header" href="{{ route('owners.houses.show', $house->id) }}">
                                                    {{ $house->name }} | {{ $house->county }} {{ $house->area }} {{ $house->address }}
                                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                                        $house->min_period && $house->pattern && $house->size &&
                                                        $house->type && $house->floor &&
                                                        $house->expenses->filter(function ($expense) {
                                                            return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                                        })->count() !== 0 &&
                                                        $house->image->whereNotNull('image')->count() !== 0 &&
                                                        $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                                        $house->features->whereNotNull('feature')->count() !== 0)
                                                    @else
                                                        <span class="badge btn-warning text-dark">
                                                            資料不完整
                                                        </span>
                                                    @endif
                                                </h3>
                                                <div class="card-body">
                                                    <form style="display: inline-block;" action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
        {{--                                                    進入房屋--}}
                                                        <a class="btn btn-primary me-1" data-bs-toggle="#houses0"
                                                           href="{{ route('owners.houses.show', $house->id) }}" role="button"
                                                           aria-expanded="false" aria-controls="houses0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                            </svg>
                                                        </a>
        {{--                                                    房屋刊登狀態--}}
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
                                                    |
                                                    <form style="display: inline-block;" action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-primary">編輯</button>
                                                    </form>
                                                    <form style="display: inline-block;" action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                                        method="POST" id="delete-form-{{ $house->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                                        <button type="submit" class="btn btn-outline-danger" @if($house->lease_status=='出租中')disabled @endif
                                                                data-lease-status="{{ $house->lease_status }}"
                                                                onclick="confirmDelete(event, {{ $house->id }})">刪除
                                                        </button>
                                                        {{--<button type="submit" class="btn btn-outline-danger" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="house-for_rent" role="tabpanel" aria-labelledby="house-for_rent-tab">
                                    <div class="row">
                                        @foreach ($for_rent as $house)
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <h3 class="card-header" href="{{ route('owners.houses.show', $house->id) }}">
                                                        {{ $house->name }} | {{ $house->county }} {{ $house->area }} {{ $house->address }}
                                                        @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                                            $house->min_period && $house->pattern && $house->size &&
                                                            $house->type && $house->floor &&
                                                            $house->expenses->filter(function ($expense) {
                                                                return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                                            })->count() !== 0 &&
                                                            $house->image->whereNotNull('image')->count() !== 0 &&
                                                            $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                                            $house->features->whereNotNull('feature')->count() !== 0)
                                                        @else
                                                            <span class="badge btn-warning text-dark">
                                                            資料不完整
                                                        </span>
                                                        @endif
                                                    </h3>
                                                    <div class="card-body">
                                                        <form style="display: inline-block;" action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            {{--                                                    進入房屋--}}
                                                            <a class="btn btn-primary me-1" data-bs-toggle="#houses0"
                                                               href="{{ route('owners.houses.show', $house->id) }}" role="button"
                                                               aria-expanded="false" aria-controls="houses0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                                </svg>
                                                            </a>
                                                            {{--                                                    房屋刊登狀態--}}
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
                                                        |
                                                        <form style="display: inline-block;" action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-primary">編輯</button>
                                                        </form>
                                                        <form style="display: inline-block;" action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                                              method="POST" id="delete-form-{{ $house->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                                            <button type="submit" class="btn btn-outline-danger" @if($house->lease_status=='出租中')disabled @endif
                                                                    data-lease-status="{{ $house->lease_status }}"
                                                                    onclick="confirmDelete(event, {{ $house->id }})">刪除
                                                            </button>
                                                            {{--<button type="submit" class="btn btn-outline-danger" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="house-listed" role="tabpanel" aria-labelledby="house-listed-tab">
                                    <div class="row">
                                        @foreach ($listed as $house)
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <h3 class="card-header" href="{{ route('owners.houses.show', $house->id) }}">
                                                        {{ $house->name }} | {{ $house->county }} {{ $house->area }} {{ $house->address }}
                                                        @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                                            $house->min_period && $house->pattern && $house->size &&
                                                            $house->type && $house->floor &&
                                                            $house->expenses->filter(function ($expense) {
                                                                return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                                            })->count() !== 0 &&
                                                            $house->image->whereNotNull('image')->count() !== 0 &&
                                                            $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                                            $house->features->whereNotNull('feature')->count() !== 0)
                                                        @else
                                                            <span class="badge btn-warning text-dark">
                                                                資料不完整
                                                            </span>
                                                        @endif
                                                    </h3>
                                                    <div class="card-body">
                                                        <form style="display: inline-block;" action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            {{--                                                    進入房屋--}}
                                                            <a class="btn btn-primary me-1" data-bs-toggle="#houses0"
                                                               href="{{ route('owners.houses.show', $house->id) }}" role="button"
                                                               aria-expanded="false" aria-controls="houses0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                                </svg>
                                                            </a>
                                                            {{--                                                    房屋刊登狀態--}}
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
                                                        |
                                                        <form style="display: inline-block;" action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-primary">編輯</button>
                                                        </form>
                                                        <form style="display: inline-block;" action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                                              method="POST" id="delete-form-{{ $house->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                                            <button type="submit" class="btn btn-outline-danger" @if($house->lease_status=='出租中')disabled @endif
                                                                    data-lease-status="{{ $house->lease_status }}"
                                                                    onclick="confirmDelete(event, {{ $house->id }})">刪除
                                                            </button>
                                                            {{--<button type="submit" class="btn btn-outline-danger" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="house-vacancy" role="tabpanel" aria-labelledby="house-vacancy-tab">
                                <div class="row">
                                    @foreach ($vacancy as $house)
                                        <div class="col-12">
                                            <div class="card mb-4">
                                                <h3 class="card-header" href="{{ route('owners.houses.show', $house->id) }}">
                                                    {{ $house->name }} | {{ $house->county }} {{ $house->area }} {{ $house->address }}
                                                    @if ($house->introduce && $house->lease_status && $house->num_renter &&
                                                        $house->min_period && $house->pattern && $house->size &&
                                                        $house->type && $house->floor &&
                                                        $house->expenses->filter(function ($expense) {
                                                            return !is_null($expense->type) && !is_null($expense->amount) && !is_null($expense->interval);
                                                        })->count() !== 0 &&
                                                        $house->image->whereNotNull('image')->count() !== 0 &&
                                                        $house->furnishings->whereNotNull('furnish')->count() !== 0 &&
                                                        $house->features->whereNotNull('feature')->count() !== 0)
                                                    @else
                                                        <span class="badge btn-warning text-dark">
                                                            資料不完整
                                                        </span>
                                                    @endif
                                                </h3>
                                                <div class="card-body">
                                                    <form style="display: inline-block;" action="{{ route('owners.locations.houses.update', [$location->id, $house->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        {{--                                                    進入房屋--}}
                                                        <a class="btn btn-primary me-1" data-bs-toggle="#houses0"
                                                           href="{{ route('owners.houses.show', $house->id) }}" role="button"
                                                           aria-expanded="false" aria-controls="houses0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                            </svg>
                                                        </a>
                                                        {{--                                                    房屋刊登狀態--}}
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
                                                    |
                                                    <form style="display: inline-block;" action="{{ route('owners.locations.houses.edit', [$location->id, $house->id]) }}" method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-primary">編輯</button>
                                                    </form>
                                                    <form style="display: inline-block;" action="{{ route('owners.locations.houses.destroy', [$location->id, $house->id]) }}"
                                                          method="POST" id="delete-form-{{ $house->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="lease_status" value="{{ $house->lease_status }}">
                                                        <button type="submit" class="btn btn-outline-danger" @if($house->lease_status=='出租中')disabled @endif
                                                                data-lease-status="{{ $house->lease_status }}"
                                                                onclick="confirmDelete(event, {{ $house->id }})">刪除
                                                        </button>
                                                        {{--<button type="submit" class="btn btn-outline-danger" {{ $house->lease_status == '出租中' ? 'disabled' : '' }}>刪除</button>--}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- / Content -->
                        <!-- Footer -->
                        <!-- / Footer -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </main>
@endsection
