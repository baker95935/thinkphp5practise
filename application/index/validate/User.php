<?php
namespace app\index\validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
		'email' =>  'require|email|unique:user',
		'password' => 'require',
		'confirmPassword' =>  "require|confirm:password",
		'__token__' => 'token',
	];

}