<?php

namespace app\admin\model;

use think\Model;

class ArticleType extends Model
{
	//关联
	public function article()
	{
		return $this->hasMany('Article','type_id');
	}
	
	
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
		$list = ArticleType::where('id','>',0)->paginate();
		return $list;
	}
}
