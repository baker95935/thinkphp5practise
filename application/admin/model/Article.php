<?php
namespace app\admin\model;

use think\Model;

class Article extends Model
{

	//设置关联
	public function articleComment()
	{
		return $this->hasMany('ArticleComment');
	}
	
	public function articleType()
	{
		return $this->belongsTo('ArticleType','type_id');
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
	public function getListInfo($where,$pagesize=10)
	{
		$list=array();
		$list = Article::with('articleType')->where('id'>0)->paginate($pagesize);
		return $list;
	}
}