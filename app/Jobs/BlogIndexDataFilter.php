<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Post;
use App\Tag;
use Carbon\Carbon;

class BlogIndexDataFilter extends Job 
{

    private  $tagName;//内部成员，tag名，用于查询
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tagName)
    {
        $this->tagName=$tagName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //有标签则过滤显示该标签下的博客，无标签则显示全部博客
         if (isset($this->tagName)){
        	return $this->getBlogDataBytag($this->tagName);
         }else{
         	return $this->getAllBlogData();
         }
    }
    
    private function getAllBlogData(){
    	$posts = Post::where ( 'published_at', '<=', Carbon::now () )
    				->where ( 'is_draft', '0' )
    				->orderBy ( 'published_at', 'desc' )
    				->paginate ( config ( 'blog.posts_per_page' ) );//读取配置文件中的值分页
    	
    	return $posts;
    }
    
    private function getBlogDataBytag($tagName){
    	//根据tag名获取对应记录的tag对象
    	$tag = Tag::where('tag', $tagName)->first();//这里不能使用firstOrFail，不然找不到数据时自动异常了
    	if ($tag){
    		$posts=$tag->posts()->where ( 'published_at', '<=', Carbon::now () )
    		->where ( 'is_draft', '0' )
    		->orderBy ( 'published_at', 'desc' )
    		->paginate ( config ( 'blog.posts_per_page' ) )
    		->get();
    	}else{
    		$posts=null;
    	}
    	
    	return $posts;
    }
}
