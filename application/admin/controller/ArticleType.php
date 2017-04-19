<?php
namespace app\admin\controller;
use app\admin\model\ArticleType as articleTypeModel;

//文章类型表
class ArticleType extends Common
{

	public function index()
	{
		$list=array();
		$articleType=new articleTypeModel();
			
		$list=$articleType->getListInfo($where=array());
	 
		$this->assign('list',$list);
		
		return view();
	}
	
	public function add()
	{
		$request = request();
		$id=$request->param('id');
		$articleType= new articleTypeModel();
		
		if($request->method()=='POST') {
			//数据获取
			$data=array(
					'type_name'=>$request->param('type_name'),
					'remark'=>$request->param('remark'),
					'id'=>$request->param('id'),
			);
				
			//数据校验
			$validate = validate('articleType');
				
			if(!$validate->check($data)){
				$this->error($validate->getError());
					
			} else {
					
				$result=0;
				if(empty($id)){//添加
					$data['create_time']=time();
					$result=$articleType->addInfo($data);
				} else {
					$result=$articleType->addInfo($data,array('id'=>$id));//更新
				}
		
				if($result) {
					$this->success('操作成功', '/admin/articleType/index/');
				} else {
					$this->success('操作失败或未生效请重试', '/admin/articleType/index/');
				}
			}
		
		}
			
		$data=array();
		!empty($id) && $data=articleTypeModel::get($id);
		
		$this->assign('data',$data);
		
		return view();
	}
	
	
	public function edit()
	{
		$articleType=new articleTypeModel();
		$request = request();
		
		if($request->method()=='GET') {
				
			$id=$request->param('id');
			$result=0;
			$result=$articleType->deleteInfo($id);
				
			if($result==0){
				$this->error('操作失败，请重试');
			} else {
				$this->success('操作成功', '/admin/articleType/index/');
			}
		}
		
		$this->error('非法操作，请重试');
	}

}