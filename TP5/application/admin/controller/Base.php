<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

abstract class Base extends Controller {
	public function _initialize() {
		if (! session ( '?userid' ) && ! session ( '?username' )) {
			return $this->error ( '管理员尚未登录', url ( '/admin/login' ) );
		}
		$this->_init ();
	}
	protected function _init() {
	}
}



