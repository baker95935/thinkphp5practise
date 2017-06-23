<?php
namespace app\index\model;

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

	
	//列表
	public function getListInfo($where,$pagesize=10)
	{
		$list=array();
		$list = Article::with('articleType')->where('id'>0)->paginate($pagesize);
		return $list;
	}
	
	//顶部3个文章的列表
	public function headerList($typeId,$limit=3)
	{
		$list=array();
		$data=array('type_id'=>$typeId);
		
		$list = Article::with('articleType')->where($data)->limit($limit)->select();
		return $list;
	}
}