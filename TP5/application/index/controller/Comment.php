<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Comment extends Controller
{
   

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
    	$filter = '他妈的|装逼|草泥马|特么的|撕逼|玛拉戈壁';
    	$array = explode('|',$filter);
        $data['content'] = str_replace($array,'**',$request->post('content'));
        $data['addtime'] = time();
        $data['user_id'] = session('userid');        
        $data['news_id'] = $request->post('news_id');
        $model = new \app\index\model\Comment($data);
        $model->save();  
	
        $newsModel = new \app\admin\model\News;
        $newsModel->where('id','=',$data['news_id'])->setInc('commentnums');
        
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function index()
    {
    	$newsid = request()->get('newsid');
    	$newsModel = new \app\admin\model\News;
    	$newsRow = $newsModel->field('id,subject,commentnums')->find($newsid);
    	$this->assign('newsRow',$newsRow);
        return $this->fetch();
    }

    
}






