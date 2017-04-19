<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
	protected $rule = [
		'title'  =>  'require|max:30|unique:article',
		'content' =>  'require',
		'type_id' => 'require',
		'__token__' => 'token',
	];

}