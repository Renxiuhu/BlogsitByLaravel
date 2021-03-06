<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="{{ config('blog.author') }}">

  <title>{{ config('blog.title') }}</title>

  {{-- Styles --}}
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/clean-blog.min.css" rel="stylesheet">
  <!-- 字体 -->
  <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="/css/blog.css" rel="stylesheet">
  @yield('styles')

</head>
<body>
<!-- 导航栏 -->
@include('blog.navbar')

@yield('page-header')
@yield('content')
<!-- 底部栏 -->
@include('blog.page-footer')

{{-- Scripts --}}
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/blog.js"></script>
@yield('scripts')

</body>
</html>