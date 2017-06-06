<?php

namespace app\index\controller;
use app\admin\model\User as userModel;

use think\Controller;
use think\Session;

class Login extends Controller
{
     
    //注册
    public function register()
    {
    	$user=new userModel();
    	$request = request();
    	$isLogin=0;
    	
    	if($request->method()=='POST') {
    		//数据获取
    		$data=array(
	    		'email'=>$request->param('email'),
	    		'username'=>$request->param('username'),
	    		'password'=>md5($request->param('password')),
	    		'confirmPassword'=>md5($request->param('confirmPassword')),
	    		'create_time'=>time(),
	    		'group'=>4,//普通会员
    		);
    			
    		//数据校验
    		$validate = validate('user');
    			
    		if(!$validate->check($data)){
    			$this->error($validate->getError());
    				
    		} else {
    				
    			unset($data['confirmPassword']);
    	
    			$result=0;
    			$res=$user->addInfo($data);
    			!empty($res) && $result=$user->validLogin($data);//生成登录状态
    			
    			if($result) {
    				
    				$this->success('注册操作成功', '/index/');
    				
    			} else {
    				$this->error('操作失败或未生效请重试', '/index/Login/regester/');
    			}
    		}
    	
    	}
    	$this->assign('isLogin',$isLogin);
    	
    	
    	return view();
    }
 
    //登录
    public function login()
    {
		$user=new userModel();
		$request = request();
		$data=array();
		
		
		if($request->method()=='POST') {
			$data['email']=$request->param('email');
			$data['password']=md5($request->param('password'));
			    				
			$user=new userModel();
			$result=$user->validLogin($data);
			    				
			if($result) {
				$this->success('登录成功', '/index/');
			}
			$this->error('登录失败，请重试');
		    				
		}
	    	
		return view();
    }
    
    //退出
    public function logout()
    {
    	Session::delete('username');
    	Session::delete('password');
    	$this->success('退出成功！', '/index/');
    }

 
}
