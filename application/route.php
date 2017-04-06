<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '[admin]'     => [
    	'index'=>['admin/index/index'],
    	'login'=>['admin/login/login'],
    	'setting'=>['admin/setting/index'],
    	'link'=>['admin/link/index'],
    	
    	'article'=>['admin/article/index'],
    	'articleType'=>['admin/articleType/index'],
    	'articleComment'=>['admin/articleComment/index'],
    	
    	'user'=>['admin/user/index'],
    	'userGroup'=>['admin/userGroup/index'],
    ],

];
