<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\PostCrtOrUpRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

class PostController extends Controller
{
	//在创建post页面默认显示的form项的值
	protected $fields = [
        'title' => '',
        'subtitle' => '',
        'page_image' => '',
        'content' => '',
        'meta_description' => '',
        'is_draft' => "0",
        'publish_date' => '',
        'publish_time' => '',
        'layout' => 'blog.layouts.post',
        'tags' => [],
		'selectedtags'=>[],
	];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//获取posts表所有记录显示在视图中
    	return view('admin.post.index')->withPosts(Post::all());//显示博客首页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//传递默认值给视图并显示
    	$data=[];
    	foreach ($this->fields as $filed => $default){
    		$data[$filed]=old($filed,$default);
    	}
    	//获取所有tags，填充到传递数据中
    	$data['tags']=old('tags',Tag::all('tag'));
    	
    	return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCrtOrUpRequest $request)
    {
        //保存文章
    	$post = Post::create($request->postFillData());
    	//同步保存tag和post tag之间关联信息
    	$post->syncTags($request->get('tags', []));
    	
    	return redirect()->route('admin.post.index')->withSuccess('New Post Successfully Created.');
    	 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
