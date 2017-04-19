<?php
namespace app\admin\validate;

use think\Validate;

class ArticleType extends Validate
{
	protected $rule = [
		'type_name'  =>  'require|max:30|unique:article_type',
		'__token__' => 'token',
	];

}