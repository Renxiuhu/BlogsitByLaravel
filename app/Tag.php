<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //定义文章与标签之间多对多关系
    public function posts(){
    	//返回有关系的模型和保存之间关系的表
    	return $this->belongsToMany('App\Post','post_tag_pivot');
    }
}
