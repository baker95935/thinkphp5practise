<?php
namespace app\index\model;
use think\Model;

class ArticleComment extends Model
{
	public function article()
	{
		return $this->belongsTo('Article');
	}
	
	//新增,更新
	public function addInfo($data,$where=array())
	{
		$result=0;
		!empty($data) && $result=$this->save($data,$where);
		return $result;
	}
	
	
	//列表
	public function getListInfo($where)
	{
		$list=array();
		$list = ArticleComment::where('id','>',0)->paginate();
		return $list;
	}

}