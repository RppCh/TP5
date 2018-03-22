<?php

namespace app\admin\controller;

use app\admin\controller\Base;
use think\Request;

class Category extends Base {
	
	/**
	 * 显示资源列表
	 *
	 * @return \think\Response
	 */
	public function index() {
		echo "123456";
	}
	
	/**
	 * 显示创建资源表单页.
	 *
	 * @return \think\Response
	 */
	public function create() {
		$records = \app\admin\model\Category::field ( 'id,catename' )->select ();
		$this->assign ( 'records', $records );
		return $this->fetch ();
	}
	
	/**
	 * 保存新建的资源
	 *
	 * @param \think\Request $request        	
	 * @return \think\Response
	 */
	public function save(Request $request) {
		// print_r($request->post());
		$model = new \app\admin\model\Category ();
		$model->save ( $request->post () );
		if ($model->id) {
			return $this->success ( '新闻分类添加成功', url ( '/admin/category/index' ) );
		} else {
			return $this->success ( '新闻分类添加失败', url ( '/admin/category/create' ) );
		}
	}
	
	/**
	 * 显示指定的资源
	 *
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function read($id) {
		//
	}
	
	/**
	 * 显示编辑资源表单页.
	 *
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * 保存更新的资源
	 *
	 * @param \think\Request $request        	
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function update(Request $request, $id) {
		//
	}
	
	/**
	 * 删除指定资源
	 *
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function delete($id) {
		//
	}
}
