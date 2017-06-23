<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\admin\model\ArticleComment as articleCommentModel;

class Comment extends Controller
{
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
    	$articleComment=new articleCommentModel();
        $request=request();
        
        if($request->method()=='POST') {
        	//数据获取
        	$data=array(
        			'username'=>$request->param('username'),
        			'content'=>$request->param('content'),
        			'id'=>$request->param('id'),
        	);
        		
        	//数据校验
        	$validate = validate('articleComment');
        		
        	if(!$validate->check($data)){
        		$this->error($validate->getError());
        			
        	} else {
        			
        		$result=0;
        		 //添加
        		$data['create_time']=time();
        		$result=$articleComment->addInfo($data);
        		 
        
        		if($result) {
        			$this->success('操作成功', '/index/articleComment/index/');
        		} else {
        			$this->success('操作失败或未生效请重试', '/index/articleComment/index/');
        		}
        	}
        
        }
    }

     
 
}
