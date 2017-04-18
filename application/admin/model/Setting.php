<?php
namespace app\admin\model;

use think\Model;

class Setting extends Model
{
	//新增,更新
	public function addInfo($data,$where=array())
	{
		$result=0;
		!empty($data) && $result=$this->save($data,$where);
		return $result;
	}

	//网站设置，只有1条数据，得到他
	public function getOneId($where=array())
	{
		$id=0;
		$info=Setting::where('id','>',0)->limit(1)->select();
		!empty($info[0]) && $id=$info[0]['id'];
	 
		return $id;
		
	}
}