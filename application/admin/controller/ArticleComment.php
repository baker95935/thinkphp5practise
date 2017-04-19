<?php
namespace app\admin\controller;
use app\admin\model\ArticleComment as articleCommentModel;

//文章评论表
class ArticleComment extends Common
{
	
	public function index()
	{
		$list=array();
		$articleComment=new articleCommentModel();
		 
		$list=$articleComment->getListInfo($where=array());
		$this->assign('list',$list);
		
		return view();
	}

	public function add()
	{
		$articleComment=new articleCommentModel();
		$request = request();
		
		$id=$request->param('id');
	 
		if($request->method()=='POST') {
			//数据获取
			$data=array(
				'title'=>$request->param('title'),
				'content'=>$request->param('content'),
				'id'=>$request->param('id'),
			);
			
			//数据校验
			$validate = validate('articleComment');
			
			if(!$validate->check($data)){
				$this->error($validate->getError());
			
			} else {
				 
				$result=0;
				if(empty($id)){//添加
					$data['create_time']=time();
					$result=$articleComment->addInfo($data);
				} else {
					$result=$articleComment->addInfo($data,array('id'=>$id));//更新
				}
				
				if($result) {
					$this->success('操作成功', '/admin/articleComment/index/');
				} else {
					$this->success('操作失败或未生效请重试', '/admin/articleComment/index/');
				}
			}
	
		}
			
		$data=array();
		!empty($id) && $data=articleCommentModel::get($id);
 
		$this->assign('data',$data);
		return view();
	}
	
	public function del()
	{
		$articleComment=new articleCommentModel();
		$request = request();
		
		if($request->method()=='GET') {
			
			$id=$request->param('id');
			$result=0;
			$result=$articleComment->deleteInfo($id);
			
			if($result==0){
				$this->error('操作失败，请重试');
			} else {
				$this->success('操作成功', '/admin/articleComment/index/');
			}
		}
		
		$this->error('非法操作，请重试');
	}
}