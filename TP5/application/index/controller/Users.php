<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Users extends Controller
{
	
	public function register(){
		return $this->fetch();
	}
	
	public function login(){
		return $this->fetch();		
	}
	
	public function logging(Request $request){
		$username = $request->post('username');
		$password = md5($request->post('password'));
		$userModel = new \app\index\model\Users;
		$row = $userModel->where('username','=',$username)->where('password','=',$password)->find();
		if($row){
			session('username',$row->username);
			session('nickname',$row->nickname);
			session('userid',$row->id);
			return redirect(url('/'));
		} 
		return $this->error('用户登录失败,免费注册新用户',url('/register'));
	}
	
	public function logout(){
		session('username',null);
		session('nickname',null);
		session('userid',null);
		return redirect(url('/login'));
	}
	
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
