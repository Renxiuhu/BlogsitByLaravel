<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//dates属性——应该被调整为日期的属性，用于Carbon日期修改器设置日期值
	protected $dates = ['published_at'];
	// 在 Post 类的 $dates 属性后添加 $fillable 属性，允许mass assign
	protected $fillable = [
			'title', 'subtitle', 'content_raw', 'page_image', 'meta_description','layout', 'is_draft', 'published_at',
	];
	
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
    
    //定义文章与标签之间多对多关系
    public function tags(){
    	return $this->belongsToMany('App\Tag','post_tag_pivot');
    }
    
    //添加新标签到tags表，同时添加关联关系到中间表
    public function syncTags(array $tags)
    {
    	Tag::addNeededTags($tags);
    
    	if (count($tags)) {
    		$this->tags ()->sync ( Tag::whereIn ( 'tag', $tags )->lists ( 'id' )->all () );
    		return;
    	}
    
    	$this->tags()->detach();
    }
}
