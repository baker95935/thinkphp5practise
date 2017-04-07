<?php
namespace app\admin\controller;
use app\admin\model\User as userModel;

//用户表
class User extends Common
{
	public function index()
	{
		$list=array();
		$users=new userModel();
		 
		$list=$users->getListInfo($where=array());
		$this->assign('list',$list);
		
		return view();
	}

	public function add()
	{
		return view();
	}
	
	public function del()
	{
		
	}
}