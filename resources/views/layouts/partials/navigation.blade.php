<nav id="nav">
    <ul>
        <li class="current"><a href="{{url('/')}}">租屋網</a></li>
        <li>
            <a href="#">會員中心</a>
            <ul>
                <li><a href="{{url('users/1')}}" style="text-align: center">個人資料</a></li>
                <li><a href="{{url('users/owners/1')}}" style="text-align: center">切換 房東 身分</a></li>
                <li><a href="{{url('renters/houses')}}" style="text-align: center">切換 租客 身分</a></li>
                <li><a href="#" style="text-align: center">登出</a></li>
            </ul>
        <li><a href="{{url('about')}}">關於我們</a></li>
        <li><a href="{{url('help')}}">幫助</a></li>
        <li><a href="{{route('register')}}">註冊</a></li>
        <li> <a href="{{route('login')}}">登入</a></li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <li> <a href="{{route('logout')}}" type="submit">登出</a></li>
        </form>
    </ul>
</nav>
