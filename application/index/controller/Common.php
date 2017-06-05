<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

class Common extends Controller
{
	public function _initialize()
	{
		$isLogin=0;
		//校验下登陆的状态
		$username=Session::get('username');
		$password=Session::get('password');
		if(!empty($username) && !empty($password)){
			$isLogin=1;
		}
		$this->assign('isLogin',$isLogin);
	}

    
 
 
}
