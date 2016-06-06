<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Jobs\BlogIndexDataFilter;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function index(Request $request)
	{
		//使用BlogIndexDataFilter Job获取需要的数据传递给视图
		$posts=$this->dispatch(new BlogIndexDataFilter($request->get('tag')));
		
		return view('blog.index')->withPosts($posts);
	}
	
	public function showPost($slug)
	{
		//whereSlug需要表中存在slug列
		$post = Post::whereSlug($slug)->firstOrFail();
		return view('blog.post')->withPost($post);
	}
}
