<ul class="nav navbar-nav">
    <li><a href="/">Blog Home</a></li>
    <!--  检测用户是否登录，登录后才显示 -->
    @if (Auth::check())
        <li @if (Request::is('admin/post*')) class="active" @endif>
            <a href="/admin/post">Posts</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="active" @endif>
            <a href="/admin/tag">Tags</a>
        </li>
    @endif
     <li>
        <a href="/contact">Contact Us</a>
     </li>
</ul>

<ul class="nav navbar-nav navbar-right">
	<!--  检测用户是否登录，未登录显示登录链接，否则显示用户名和注销链接 -->
    @if (Auth::guest())
        <li><a href="/auth/login">Login</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  
                    aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout" style="color:black;">Logout</a></li>
            </ul>
        </li>
    @endif
</ul>