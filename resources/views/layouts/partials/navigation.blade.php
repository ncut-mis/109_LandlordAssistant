<nav id="nav">
    <ul>
        <li class="current"><a href="{{url('/')}}">租屋網</a></li>
        <li>
            <a href="#">會員中心</a>
            <ul>
                <li><a href="{{url('users/{user}')}}" style="text-align: center">個人資料</a></li>
                <li><a href="{{url('users/owners/{owner}')}}" style="text-align: center">切換 房東 身分</a></li>
                <li><a href="{{url('users/renters/{renter}')}}" style="text-align: center">切換 租客 身分</a></li>
            </ul>
{{--        <li><a href="{{url('about')}}">關於我們</a></li>--}}
{{--        <li><a href="{{url('help')}}">幫助</a></li>--}}
        @if (!Auth::check())
        <li><a href="{{route('register')}}">註冊</a></li>
        <li> <a href="{{route('login')}}">登入</a></li>
        @endif
        @if (Auth::check())
            <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a></li>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
       @endif
    </ul>
</nav>
