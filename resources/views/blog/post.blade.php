@extends('blog.layout')

@section('page-header')
  <header class="intro-header"
          style="background-image: url('/imgs/home-bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="post-heading">
            <h1>{{ $post->title }}</h1>
            <h2 class="subheading">{{ $post->subtitle }}</h2>
            <span class="meta">
              Posted on {{ $post->published_at->format('F j, Y') }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>
@stop

<!-- 填充页面主体内容 -->
@section('content')
{{-- The Post --}}
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          {!! $post->content_raw !!}
        </div>
      </div>
      <hr>
    </div>
  </article>
  
  {{-- The Pager --}}
  <div class="container">
    <div class="row">
      <ul class="pager">
            <li class="previous">
              <button onclick="history.go(-1)" class="btn btn-primary">
                <i class="fa fa-long-arrow-left fa-lg">« Back</i>
              </button>
            </li>
      </ul>
    </div>
  </div>
@endsection