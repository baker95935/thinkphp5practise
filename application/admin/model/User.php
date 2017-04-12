<?php
namespace app\admin\model;

use think\Model;
use think\Session;

class User extends Model
{
	//新增,更新
	public function addInfo($data,$where=array())
	{
		$result=0;
		!empty($data) && $result=$this->save($data,$where);
		return $result;
	}
	
 
	
	//删除
	public	function deleteInfo($id)
	{
		$result=0;
		$id && $result=$this->destroy($id);
		
		return $result;
	}
	
	//列表
	public function getListInfo($where)
	{
		$list=array();
		$list = User::where('id','>',0)->paginate();
		return $list;
	}
	
	//验证登录
	public function validLogin($data) 
	{
		//逻辑思路处理，根据用户名找密码
		$result=0;

		if(!empty($data['email']) && !empty($data['password']))
		{
			$dataInfo=User::where('email','=',$data['email'])->find();
			if(md5($data['password'])==$dataInfo['password']) 
			{
				Session::set('username',$dataInfo['username']);
				Session::set('password',md5($dataInfo['id'].$dataInfo['password']));
				$result=1;
			}
		}
		
		return $result;
	 
	}

}