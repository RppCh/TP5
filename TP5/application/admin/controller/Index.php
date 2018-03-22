<?php

namespace app\admin\controller;

use app\admin\controller\Base;
use think\Request;

class Index extends Base
{
	
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }

   
}
