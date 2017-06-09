<?php

namespace app\index\controller;
use app\admin\model\Article as articleModel;
 
class News extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
    	$list=array();
    	$article=new articleModel();
    		
    	$list=$article->getListInfo(array(),9);
    	
    	$this->assign('list',$list);
    	
    	return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view();
    }

 
    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

 
 
}
