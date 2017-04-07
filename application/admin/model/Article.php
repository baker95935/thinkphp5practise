<?php
namespace app\admin\model;

use think\Model;

class Article extends Model
{
	//新增
	public function add($data)
	{
		return $this->save($data);
	}
	
	//更新
	public function update($data,$where)
	{
		return $this->save($data,$where);
	}
	
	//删除
	public	function delete($id)
	{
		return $this->destroy($id);
	}
	
	//列表
	public function getList($where)
	{
		$list=array();
		$list = User::all($where);
		return $list;
	}
}