<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {     
       $records = \app\admin\model\Category::all();
       $this->assign('records',$records);	 
       return $this->fetch();
    }
    
  

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
       $record = \app\admin\model\News::get($id);
       $this->assign('record',$record);
       return $this->fetch();
    }

    public function category($id){
    	$model = new \app\admin\model\News;
    	$records = $model->where('category_id','=',$id)->select();
    	$this->assign('records',$records);
    	return $this->fetch();
    }
   
}






