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
        <li><a href="#">註冊/登入</a></li>
    </ul>
</nav>
