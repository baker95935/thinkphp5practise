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
		$user=new userModel();
		$request = request();
		
		$id=$request->param('id');
	 
		if($request->method()=='POST') {
			//数据获取
			$data=array(
				'username'=>$request->param('username'),
				'email'=>$request->param('email'),
				'password'=>md5($request->param('password')),
				'confirmPassword'=>md5($request->param('confirmPassword')),
				'id'=>$request->param('id'),
			);
			
			//数据校验
			$validate = validate('user');
			
			if(!$validate->check($data)){
				$this->error($validate->getError());
			
			} else {
				 
				unset($data['confirmPassword']);
				
				if(empty($id)){//添加
					$data['create_time']=time();
					$result=$user->addInfo($data);
				} else {
					$result=$user->addInfo($data,array('id'=>$id));//更新
				}
				
				
				$result && $this->success('操作成功', '/admin/user/index/');
			}
	
		}
			
		$data=array();
		!empty($id) && $data=UserModel::get($id);
 
		$this->assign('data',$data);
		return view();
	}
	
	public function del()
	{
		
	}
}