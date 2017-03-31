<?php
return [
// 定义admin模块的自动生成
'admin' => [
'__dir__'    => ['controller', 'model', 'view'],
'controller' => ['User', 'UserType','Login','Artile','Index','ArticleComment','Setting'],
'model'      => ['User', 'UserType','Artile','ArticleComment','Setting'],
'view'       => ['index/index', 'index/test'],
],
];