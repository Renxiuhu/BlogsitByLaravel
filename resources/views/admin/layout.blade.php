<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('blog.title') }} Admin</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <!-- 继承自该布局的子视图的 styles 区块内容 -->
        @yield('styles')
    </head>
    <body>

        {{-- Navigation Bar --}}
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ config('blog.title') }} Admin</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                	<!-- 这里引入导航栏view文件 -->
                    @include('admin.navbar')
                </div>
           </div>
        </nav>
		<!-- 页面的主体内容 -->
        @yield('content')
        
		<!-- 加载Javascript脚本 -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        @yield('scripts')

    </body>
</html>