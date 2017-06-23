<?php

namespace app\index\controller;

use think\Request;
use app\index\model\Article as articleModel;

class Product extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view();
    }


    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function detail($id)
    {
        $request=Request();
        $id=$request->param('id');
        
        $articleInfo=articleModel::get($id);
       	$this->assign('articleInfo',$articleInfo);
       	
       	return view();
    }

 

 
 
}
