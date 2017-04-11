<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
		'username'  =>  'require|max:30',
		'email' =>  'require|email',
		'password' => 'require',
		'confirmPassword' =>  "require|confirm:password",
		'__token__' => 'token',
	];

}