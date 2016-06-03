<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagUpdateRequest extends Request
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
				'layout' => 'required' 
		];
    }
}
