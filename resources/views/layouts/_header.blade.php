<a name="page_top"></a>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand " href="{{ url('/') }}">
            ChangGE
        </a>
        <a class="nav-link text-secondary " href="{{route('photos.index')}}">图片</a>
        <a class="nav-link text-secondary" href="{{route('articles.index')}}">文章</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Gate::allows('mang-content'))
                <li class="nav-item "><a class="nav-link" href="{{route('photos.create')}}">添加图片</a></li>
                <li class="nav-item "><a class="nav-link" href="{{route('articles.create')}}">添加文章</a></li>
                @endif
                @if (Gate::allows('mang-user'))

                <li class="nav-item "><a class="nav-link" href="{{route('users.index')}}">用户管理</a></li>
                @endif

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                @else
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    {{ Auth::user()->name }}<button type="submit>" class="btn btn-link"
                        style="padding:0px 10px 0px 10px">退出</button>
                </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
