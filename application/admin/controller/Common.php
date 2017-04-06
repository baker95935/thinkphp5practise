<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Common extends Controller
{
	public function _initialize()
	{
		$request = Request::instance();
		$nav=$request->controller();
		
		$this->assign('nav',$nav);
	}

}