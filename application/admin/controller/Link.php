<?php
namespace app\admin\controller;
use app\admin\model\Link as linkModel;

//友情链接
class Link extends Common
{
	public function index()
	{
		$list=array();
		$links=new linkModel();
		 
		$list=$links->getListInfo($where=array());
		$this->assign('list',$list);
		
		return view();
	}

	public function add()
	{
		$links=new linkModel();
		$request = request();
		
		$id=$request->param('id');
	 
		if($request->method()=='POST') {
			//数据获取
			$data=array(
				'link_name'=>$request->param('link_name'),
				'link_url'=>$request->param('link_url'),
				'link_order'=>$request->param('link_order'),
				'link_img_url'=>$request->param('link_img_url'),
				'id'=>$request->param('id'),
			);
			
			//数据校验
			$validate = validate('link');
			
			if(!$validate->check($data)){
				$this->error($validate->getError());
			
			} else {
				 
				$result=0;
				if(empty($id)){//添加
					$data['create_time']=time();
					$result=$links->addInfo($data);
				} else {
					$result=$links->addInfo($data,array('id'=>$id));//更新
				}
				
				if($result) {
					$this->success('操作成功', '/admin/link/index/');
				} else {
					$this->success('操作失败或未生效请重试', '/admin/link/index/');
				}
			}
	
		}
			
		$data=array();
		!empty($id) && $data=LinkModel::get($id);
 
		$this->assign('data',$data);
		return view();
	}
	
	public function del()
	{
		$links=new linkModel();
		$request = request();
		
		if($request->method()=='GET') {
			
			$id=$request->param('id');
			$result=0;
			$result=$links->deleteInfo($id);
			
			if($result==0){
				$this->error('操作失败，请重试');
			} else {
				$this->success('操作成功', '/admin/link/index/');
			}
		}
		
		$this->error('非法操作，请重试');
	}
}