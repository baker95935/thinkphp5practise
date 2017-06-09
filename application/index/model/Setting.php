<?php
namespace app\index\model;

use think\Model;

class Setting extends Model
{

	//网站设置，只有1条数据，得到他
	public function getOneId($where=array())
	{
		$id=0;
		$info=Setting::where('id','>',0)->limit(1)->select();
		!empty($info[0]) && $id=$info[0]['id'];
	 
		return $id;
		
	}
}