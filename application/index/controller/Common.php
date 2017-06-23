<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\model\Setting as settingModel;
use app\index\model\Article as articleModel;


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
		
		//产品中心
		$article=new articleModel();
		$articleList=$article->headerList(1);
		$this->assign('articleList',$articleList);
		
		//新闻中心
		$newsList=$article->headerList(4);
		$this->assign('newsList',$newsList);
	}

    
 
 
}
