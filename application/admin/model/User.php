<?php
namespace app\admin\model;

use think\Model;

class User extends Model
{
	//新增
	public function addInfo($data)
	{
		$result=0;
		!empty($result) && $result=$this->save($data);
		return $result;
	}
	
	//更新
	public function updateInfo($data,$where)
	{
		$result=0;
		if(!empty($data) && !empty($where)) {
			$result=$this->save($data,$where);
		}
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

}