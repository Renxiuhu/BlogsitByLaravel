<?php
/**
* markdown类
* @author barret
* @date  2016年5月26日下午10:26:56
*/
namespace App\Services;
//使用SmartyPants的markdown扩展包
use Michelf\MarkdownExtra;
use michelf\SmartyPants;

class Markdowner
{
	/*
	 * 将markdown文本转换为标准html文本
	 */
	public function toHTML($text)
	{
		$text = MarkdownExtra::defaultTransform($text);
		//$text = SmartyPants::defaultTransform($text);
		return $text;
	}

}