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
    
    //保存新标签，只保存表中没有的
    public static function addNeededTags(array $tags) {
		if (count ( $tags ) === 0) {
			return;
		}
		
		$found = static::whereIn ( 'tag', $tags )->lists ( 'tag' )->all ();
		
		foreach ( array_diff ( $tags, $found ) as $tag ) {
			static::create ( [ 
					'tag' => $tag,
					'title' => $tag,
					'subtitle' => 'Subtitle for ' . $tag,
					'page_image' => '',
					'meta_description' => '',
					'reverse_direction' => false 
			] );
		}
	}
}
