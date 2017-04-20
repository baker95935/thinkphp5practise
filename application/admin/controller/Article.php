<?php
namespace app\admin\controller;
use app\admin\model\Article as articleModel;
use app\admin\model\ArticleType as articleTypeModel;
 
//文章表
class Article extends Common
{

	public function index()
	{
		$list=array();
		$article=new articleModel();
		 
		$list=$article->getListInfo($where=array());
 
		$this->assign('list',$list);
		
		return view();
	}

	public function add()
	{
		$article=new articleModel();
		$articleType=new articleTypeModel();
		$request = request();
		
		$id=$request->param('id');
	 
		if($request->method()=='POST') {
			//数据获取
			$data=array(
				'title'=>$request->param('title'),
				'content'=>$request->param('content'),
				'type_id'=>$request->param('type_id'),
				'cover_pic'=>$request->param('cover_pic'),
				'id'=>$request->param('id'),
			);
			
			//数据校验
			$validate = validate('article');
			
			if(!$validate->check($data)){
				$this->error($validate->getError());
			
			} else {
				 
				$result=0;
				if(empty($id)){//添加
					$data['create_time']=time();
					$result=$article->addInfo($data);
				} else {
					$result=$article->addInfo($data,array('id'=>$id));//更新
				}
				
				if($result) {
					$this->success('操作成功', '/admin/article/index/');
				} else {
					$this->success('操作失败或未生效请重试', '/admin/article/index/');
				}
			}
	
		}
			
		$data=array();
		!empty($id) && $data=articleModel::get($id);
 
		$listType=$articleType->getListInfo($where=array());
		
		$this->assign('listType',$listType);
		$this->assign('data',$data);
		return view();
	}
	
	public function del()
	{
		$article=new articleModel();
		$request = request();
		
		if($request->method()=='GET') {
			
			$id=$request->param('id');
			$result=0;
			$result=$article->deleteInfo($id);
			
			if($result==0){
				$this->error('操作失败，请重试');
			} else {
				$this->success('操作成功', '/admin/article/index/');
			}
		}
		
		$this->error('非法操作，请重试');
	}
}