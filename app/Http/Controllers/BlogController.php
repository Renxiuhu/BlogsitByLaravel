<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
	public function index()
	{
		$posts = Post::where('published_at', '<=', Carbon::now())
				->orderBy('published_at', 'desc')
				->paginate(config('blog.posts_per_page'));//读取配置文件中的值分页
	
		return view('blog.index', compact('posts'));
	}
	
	public function showPost($slug)
	{
		//whereSlug需要表中存在slug列
		$post = Post::whereSlug($slug)->firstOrFail();
		return view('blog.post')->withPost($post);
	}
}
