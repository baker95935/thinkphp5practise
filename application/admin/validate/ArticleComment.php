<?php
namespace app\admin\validate;

use think\Validate;

class articleComment extends Validate
{
	protected $rule = [
		'title'  =>  'require|max:30|unique:article_comment',
		'__token__' => 'token',
	];

}