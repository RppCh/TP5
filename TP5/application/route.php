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

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];



use think\Route;

//管理员路由
Route::get('admin/index','admin/Index/index');
Route::get('admin/category/index','admin/Category/index');
Route::get('admin/category/create','admin/Category/create');
Route::post('admin/category/save','admin/Category/save');

Route::get('admin/partner/index','admin/Partner/index');
Route::get('admin/partner/create','admin/Partner/create');
Route::post('admin/partner/save','admin/Partner/save');

Route::get('admin/news/index','admin/News/index');
Route::get('admin/news/create','admin/News/create');
Route::post('admin/news/save','admin/News/save');
Route::put('admin/news/checked/:id','admin/News/checked');
Route::put('admin/news/unchecked/:id','admin/News/unchecked');
Route::get('admin/news/edit/:id','admin/News/edit');
Route::put('admin/news/update/:id','admin/News/update');

Route::get('admin/login','admin/Admin/login');
Route::post('admin/logging','admin/Admin/logging');
Route::get('admin/logout','admin/Admin/logout');




////////////////////////////////////////////////////
//所有用户的路由
Route::get('/','index/Index/index');

Route::get('category/:id','index/Index/category');

Route::get('view/:id','index/Index/read');


Route::get('login','index/Users/login');
Route::post('login','index/Users/logging');
Route::get('register','index/Users/register');
Route::get('logout','index/Users/logout');

Route::get('comment/default','index/Comment/index');
Route::post('comment/post','index/Comment/save');
















