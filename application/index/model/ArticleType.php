<?php

namespace app\index\model;

use think\Model;

class ArticleType extends Model
{
	//关联
	public function article()
	{
		return $this->hasMany('Article','type_id');
	}
	
	
	//列表
	public function getListInfo($where)
	{
		$list=array();
		$list = ArticleType::where('id','>',0)->paginate();
		return $list;
	}
}
