<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactMeRequest;

class ContactController extends Controller
{
    public function showForm(){
    	//显示联系我们需要填写的form项
    	return view('blog.contact');
    }
    
    public function sendMail(ContactMeRequest $request){
    	$messages = explode("\n", $request->get('message'));
    	$data = [ 
				'name' => $request->get ( 'name' ),
				'email' => $request->get ( 'email' ),
				'phone' => $request->get ( 'phone' ),
				'messages' => $messages
		];
    	//发送邮件
    	Mail::send('blog.emails',$data,function($message) use ($data){
	    		$to='barret.ren@foxmail.com';
	    		$message->to($to)
	    			->subject('Blog contact from '.$data['name'])
	    			->replyTo($data['email']);
    	});
    	
    	return back()
            ->withSuccess("Thank you for your message. It has been sent.");
    }
}
