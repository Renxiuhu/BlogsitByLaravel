<!-- 导入模板 -->
@extends('admin.layout')

<!-- 填充页面主体内容 -->
@section('content')
<div class="container">
	<h1>{{ $post->title }}</h1>
	<h5>{{ $post->published_at }}</h5>
	<hr>
	{!! nl2br(e($post->content)) !!}
	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">« Back</button>
</div>
@endsection