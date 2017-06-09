<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\model\Setting as settingModel;;

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
		
 		//网站SEO相关
		$setting=new settingModel();
		$id=$setting->getOneId();
		$settingInfo=SettingModel::get($id);
	 
		$this->assign('settingInfo',$settingInfo);
		
	}

    
 
 
}
