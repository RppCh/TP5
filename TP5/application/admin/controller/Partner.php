<?php

namespace app\admin\controller;

use app\admin\controller\Base;

use think\Request;

class Partner extends Base
{

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
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
    	$model = new \app\admin\model\Partner;
    	$row = $model->where('name','=',$request->post('name'))->whereOr('website','=',$request->post('website'))->find();
    	if($row){
    		return $this->error('网站名称或URL地址重复',url('/admin/partner/create'));
    	} else {
    		$int = $model->save($request->post());
    		if($int){
    			return $this->success('合作伙伴添加成功',url('/admin/partner/index'));
    		} else {
    			return $this->error('添加失败',url('/admin/partner/create'));
    		}
    	}
        //echo '合作伙伴添加成功';
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
