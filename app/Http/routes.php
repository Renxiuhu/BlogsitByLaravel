<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','auth']],function(){
	Route::resource('admin/post','Admin\PostController');//管理员管理博客文章相关路由
	Route::resource('admin/tag','Admin\TagController');
	Route::get('admin/upload','Admin\UploadController@index');//管理员上传路由
});

Route::group(['middleware' => 'web'], function () {
	//博客列表和博客详细内容路由
	Route::get('/', function () {
		return redirect('/blog');
	});
	Route::get('blog', 'BlogController@index');
	Route::get('blog/{slug}', 'BlogController@showPost');//根据文章名获取文章
	
	//后台管理系统相关路由
	Route::get("admin",function (){
		return redirect("/admin/post");
	});
	//登录路由
	Route::get('auth/login','Auth\AuthController@showLoginForm');//使用框架自带的控制器
	Route::post('auth/login','Auth\AuthController@login');
	//注销路由
	Route::get('auth/logout','Auth\AuthController@logout');
});

