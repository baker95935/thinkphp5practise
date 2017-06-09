<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Solution extends Common
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
    public function read($id)
    {
        return view();
    }

 
 
}
