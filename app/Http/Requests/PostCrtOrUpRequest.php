<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class PostCrtOrUpRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//验证用户是否经过登录认证
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
        	'subtitle' => 'required',
			'content' => 'required',
			'publish_date' => 'required',
			'publish_time' => 'required',
			'layout' => 'required',
        		
        ];
    }
    
    //自定义方法，从请求数据中获取数据作为数组返回
    public function postFillData() {
		$published_at = new Carbon ( $this->publish_date . ' ' . $this->publish_time );
		return [ 
				'title' => $this->title,
				'subtitle' => $this->subtitle,
				'page_image' => $this->page_image,
				'content_raw' => $this->get ( 'content' ),
				'meta_description' => $this->meta_description,
				'is_draft' => ( bool ) $this->is_draft,
				'published_at' => $published_at,
				'layout' => $this->layout,
		];
	}
}
