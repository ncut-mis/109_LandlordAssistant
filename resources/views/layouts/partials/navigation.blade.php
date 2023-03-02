<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">租屋網</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
{{--                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>--}}
                <li class="nav-item"><a class="nav-link" href="{{url('about')}}">關於我們</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('help')}}">幫助</a></li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">會員中心</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">房東</a></li>
{{--                        <li><hr class="dropdown-divider" /></li>--}}
                        <li><a class="dropdown-item" href="{{url('renters/houses')}}">租客</a></li>
                        <li><a class="dropdown-item" href="{{url('users/1')}}">個人資料</a></li><!--尚未連接資料庫-->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">登出</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <img class="bi-cart-fill me-1" src="assets/img/axxot-hvtex.svg" width="15px"/>
                    註冊/登入
                </button>
            </form>
        </div>
    </div>
</nav>
