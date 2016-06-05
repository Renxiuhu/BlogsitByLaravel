<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//dates属性——应该被调整为日期的属性，用于Carbon日期修改器设置日期值
	protected $dates = ['published_at'];

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
}
