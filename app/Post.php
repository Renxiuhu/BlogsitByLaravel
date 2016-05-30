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
}
