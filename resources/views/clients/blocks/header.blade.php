<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

    <div class="container">
        <a class="navbar-brand" href="index.html">Findstate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto d-flex ">
                <!-- để danh mục ở menu ...?? -->
                <li class="nav-item "><a href="{{route('clients.pages.home')}}" class="nav-link">Trang chủ </a></li>

                <!-- demo sản phẩm  -->
                <li class="nav-item"><a href="{{route('clients.pages.product')}}" class="nav-link">bất động sản </a></li>
                <li class="nav-item"><a href="{{route('clients.pages.about')}}" class="nav-link">Về chúng tôi</a></li>
                <li class="nav-item"><a href="{{route('clients.pages.blog')}}" class="nav-link">Bài viết </a></li>
                <li class="nav-item"><a href="#" class="nav-link">Liên Hệ </a></li>
               
                <li class="nav-item">
                    <div class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <div class="nav-item dropdown d-flex">
                    @if (Auth::check())
                    <a href="{{route('account.quanlytaikhoan.home')}}"> <img src="{{$avatar }}" alt="avatar" class="rounded-circle me-2" style="width: 40px;height:40px;"> </a>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle " href="{{route('account.quanlytaikhoan.home')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    @endif
                    @endguest
            </ul>
            </li>

            </ul>

        </div>

    </div>
</nav>

<!-- END nav -->