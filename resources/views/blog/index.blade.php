@extends('blog.layout')

@section('page-header')
  <header class="intro-header"
          style="background-image: url('/imgs/home-bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1>{{ config('blog.title') }}</h1>
            <hr class="small">
            <h2 class="subheading">{{ config('blog.subtitle') }}</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      
        @if($posts)
        {{-- 文章列表 --}}
        @foreach ($posts as $post)
          <div class="post-preview">
            <!--点击标题或副标题显示博客内容-->
            <a href="/blog/{{ $post->slug }}">
              <h2 class="post-title">{{ $post->title }}</h2>
              @if ($post->subtitle)
                <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
              @endif
            </a>
            <!-- 显示内容概要内容 -->
            <p>{{ str_limit($post->content_raw) }}</p>
            <p class="post-meta">
            <!-- 显示发布时间 -->
              <i>Posted on {{ $post->published_at->format('F j, Y') }}</i>
            </p>
          </div>
          <hr>
        @endforeach

        {{-- 分页 --}}
        <ul class="pager">
            @if ($posts->currentPage() > 1)
              <li class="previous">
                <a href="{!! $posts->url($posts->currentPage() - 1) !!}">
                  <i class="fa fa-long-arrow-left fa-lg"></i>
                  Previous Page >>
                </a>
              </li>
            @endif
            @if ($posts->hasMorePages())
              <li class="next">
                <a href="{!! $posts->nextPageUrl() !!}">
                  << Next Page
                  <i class="fa fa-long-arrow-right"></i>
                </a>
              </li>
            @endif
        </ul>
        @else
            <hr>Sorry,no blogs in this tag
        @endif
      </div>
    </div>
  </div>
@stop