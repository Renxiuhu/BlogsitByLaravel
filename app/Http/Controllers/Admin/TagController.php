<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
	//在创建tag页面默认显示的form项的值
	protected $fields = [
			'tag' => '',
			'title' => '',
			'subtitle' => '',
			'meta_description' => '',
			'page_image' => '',
			'layout' => 'blog.layouts.index',
			'reverse_direction' => 0,
	];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tags = Tag::all();//获取所有数据
    	//调用index视图显示标签
    	return view('admin.tag.index')->withTags($tags);
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
        	/*在Laravel如果想在提交表单的过程中保留表单数据的话，就需要使用Input:flash()来闪存表单数据，
        	* 然后使用 {{Input::old(‘fieldname’)}}来获取表单数据。这样在表单在退回时，数据就都在，就不用重复填写了。
        	* 这里使用old模拟这种情况，填充默认值*/
        	$data[$filed]=old($filed,$default);
        }
        //不能使用withData了
        return view('admin.tag.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest  $request)
    {
        //通过验证，保存tag
        $tag=new Tag();
        foreach (array_keys($this->fields) as $field) {
        	$tag->$field = $request->get($field);
        }
        $tag->save();
        
        //跳转到tag index页面
        return redirect('/admin/tag')->withSuccess("The tag '$tag->tag' was created.");
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
    	//先根据id获取到指定的数据行
    	$tag=Tag::findOrFail($id);
    	$data=['id'=>$id];//先加上id，因为$field中没有id字段
    	foreach (array_keys($this->fields) as $field) {
        	$data[$field] = old($field, $tag->$field);
   		}
    	
    	return view('admin.tag.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tag=Tag::findOrFail($id);
        //tag名不允许修改，因此设置值时排除tag
        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
        	$tag->$field = $request->get($field);
        }
        $tag->save();
        
        //跳转到tag index页面
        return redirect('/admin/tag')->withSuccess("The tag '$tag->tag' was updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
    	$tag->delete();

    	return redirect('/admin/tag')
                    ->withSuccess("The '$tag->tag' tag has been deleted.");
    }
}
