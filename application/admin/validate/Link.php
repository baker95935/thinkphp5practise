<?php
namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{
	protected $rule = [
		'link_name'  =>  'require|max:30|unique:link',
		'link_url' =>  'require|url|unique:link',
		'__token__' => 'token',
	];

}