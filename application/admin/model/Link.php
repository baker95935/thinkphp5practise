<?php
namespace app\admin\model;

use think\Model;

class Link extends Model
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
		$list = Link::where('id','>',0)->order('link_order desc')->paginate();
		return $list;
	}

}