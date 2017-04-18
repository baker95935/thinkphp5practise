<?php
namespace app\admin\controller;
use app\admin\model\Setting as settingModel;
//网站设置表
class Setting extends Common
{

	public function index()
	{
		$setting=new settingModel();
		$request=request();
		
		$id=$request->param('id');
		if(empty($id)) {
			$id=$setting->getOneId();
		}
 
		if($request->method()=='POST') {
			//数据获取
			$data=array(
				'web_name'=>$request->param('web_name'),
				'web_url'=>$request->param('web_url'),
				'web_title'=>$request->param('web_title'),
				'web_description'=>$request->param('web_description'),
				'web_keywords'=>$request->param('web_keywords'),
				'icp_info'=>$request->param('icp_info'),
				'id'=>$request->param('id'),
			);
	 
			$result=0;
			if(empty($id)){//添加
				$data['create_time']=time();
				$result=$setting->addInfo($data);
			} else {
				$result=$setting->addInfo($data,array('id'=>$data['id']));//更新
			}
			
			if($result) {
				$this->success('操作成功', '/admin/setting/index/');
			} else {
				$this->success('操作失败或未生效请重试', '/admin/setting/index/');
			}
		}
			
		$data=array();
		!empty($id) && $data=SettingModel::get($id);
		$this->assign('data',$data);
		
		return view();
	}
}