<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Controller {
	
	public function login() {
		return $this->fetch ();
	}
	
	public function logging(Request $request) {
		$username = $request->post ( 'username' );
		$password = md5 ( $request->post ( 'password' ) );
		$model = new \app\admin\model\Admin ();
		$row = $model->where ( 'username', '=', $username )->where ( 'password', '=', $password )->find ();
		if ($row) {
			session ( 'userid', $row->id );
			session ( 'username', $row->username );
			return redirect ( url ( '/admin/index' ) );
		}
		return $this->error ( '用户名或密码错误', url ( '/admin/login' ) );
	}
	
	public function logout() {
		session ( 'userid', null );
		session ( 'username', null );
		return redirect ( url ( '/admin/login' ) );
	}
}




