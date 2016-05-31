<!-- 导入模板 -->
@extends('admin.layout')

<!-- 填充页面主体内容 -->
@section('content')
<div class="container">
	<h1>{{ config('blog.title') }}</h1>
	<h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
	<hr>
	<ul>
		@foreach ($posts as $post)
		<li>
			<a href="/blog/{{ $post->slug }}">{{ $post->title }}</a> 
			<em>({{$post->published_at }})</em>
			<p>{{ str_limit($post->content) }}</p>
		</li> @endforeach
	</ul>
	<hr>
	{!! $posts->render() !!}
</div>
@endsection