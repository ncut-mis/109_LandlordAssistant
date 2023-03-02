@extends('layouts.master')
@section('title', '房東管理')
@section('content')

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <section class="py-5">
        <div class="container">

                <div class="css_table" style="display:table">
                    <div class="row" style="display:table-row;">
                        <form action="{{route('owners.locations.store')}}" method="POST">
                            @method('POST')
                            @csrf
                            <label for="input" >新增出租地點：</label>
                            <input type="text" id="input" name="input">
                            <button  type="submit" class="mt-4">{{ __('儲存') }}</button>
                        </form>
                        <button >全</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <!--<th scope="col">標題</th>-->
                                    <th scope="col" style="text-align: left;width: 10%">房屋名稱</th>
                                    <th scope="col" style="text-align: left">狀態</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <!--<th scope="col">標題</th>-->
                                    <td style="text-align: left">{{$location->name}}</td>
                                  <!--  <td style="text-align: right;width: 10%">
                                        <a class="btn btn-secondary" href="{{ route('admin.classes.edit',$location->id) }}">修改</a>
                                        <form action="{{ route('admin.classes.destroy',$location->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button class="btn btn-danger">刪除</button>
                                        </form>
                                    </td>-->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <p>台中XXXXXXXXXXXXX
                            <select >
                                <option value="">修改地點</option>
                                <option value="">刪除地點</option>
                                <option value="">加入房屋</option>
                                <option value="">公告管理</option>
                            </select>
                        </p>


                        </select>
                        <button >頁面1</button>
                        <button >頁面1</button>
                        <button >頁面1</button>

                    </div>
                </div>

        </div>

    </section>
@endsection


