<?php

namespace app\admin\controller;

use app\admin\controller\Base;
use think\Request;

class News extends Base 
{
	
	/**
	 * 显示资源列表
	 *
	 * @return \think\Response
	 */
	public function index() {
		$records = \app\admin\model\News::all ();
		$this->assign ( 'records', $records );
		return $this->fetch ();
	}
	
	/**
	 * 显示创建资源表单页.
	 *
	 * @return \think\Response
	 */
	public function create() {
		$categoryRowset = \app\admin\model\Category::all ();
		$partnerRowset = \app\admin\model\Partner::all ();
		$this->assign ( 'categoryRowset', $categoryRowset );
		$this->assign ( 'partnerRowset', $partnerRowset );
		return $this->fetch ();
	}
	
	/**
	 * 保存新建的资源
	 *
	 * @param \think\Request $request        	
	 * @return \think\Response
	 */
	public function save(Request $request) {
		$request->post ( [ 
				'addtime' => time () 
		] );
		// 这个是需要进行修改的
		$request->post ( [ 
				'admin_id' => 1 
		] );
		/////////////////文件上传
		$file = $request->file('thumb')->move(ROOT_PATH . '/public/static/common/photoview');
		//图像裁切
		$image = \think\Image::open($file->getPathName());
		$width = 150;
		$height = 100;
		$x = ceil(($image->width()-$width)/2);
		$y = ceil(($image->height()-$height)/2);
		$image->crop($width, $height,$x,$y)->save($file->getPathName());
		$request->post(['thumb'=>$file->getSaveName()]);
		
		
		$model = new \app\admin\model\News ();
		$model->save ( $request->post () );
		if ($model->id) {
			return $this->success ( '新闻发布成功', url ( '/admin/news/index' ) );
		} else {
			return $this->error ( '新闻发布失败', url ( '/admin/news/create' ) );
		}
	}
	
	/**
	 * 新闻通过审核
	 *
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function checked($id) {
		//
		$model = \app\admin\model\News::get ( $id );
		$model->is_checked = 1;
		$model->save ();
		//已审核==>未审核
		//return 'checked';
		//return redirect ( url ( '/admin/news/index' ) );
		//return '<a href="javascript:void(0)" class="unchecked" data-id="' . $id . '">已审核</a>';
		return $id;
	}
	
	/**
	 * 新闻取消审核
	 *
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function unchecked($id) {
		//
		$model = \app\admin\model\News::get ( $id );
		$model->is_checked = 0;
		$model->save ();
		return $id;
		//return '<a href="javascript:void(0)" class="checked" data-id="' . $id . '">未审核</a>';
		//return redirect ( url ( '/admin/news/index' ) );
	}
	
	/**
	 * 显示编辑资源表单页.
	 *
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function edit($id) {
		$newsRecord = \app\admin\model\News::get($id);
		$categoryRowset = \app\admin\model\Category::all ();
		$partnerRowset = \app\admin\model\Partner::all ();
		$this->assign ( 'categoryRowset', $categoryRowset );
		$this->assign ( 'partnerRowset', $partnerRowset );
		$this->assign('newsRecord',$newsRecord);
		return $this->fetch ();
	}
	
	/**
	 * 保存更新的资源
	 *
	 * @param \think\Request $request        	
	 * @param int $id        	
	 * @return \think\Response
	 */
	public function update(Request $request, $id) {
		//echo '新闻' , $id , '编辑成功';
		$model = \app\admin\model\News::get($id);
		$model->subject = $request->put('subject');
		$model->content = $request->put('content');
		$model->category_id = $request->put('category_id');
		$model->partner_id = $request->put('partner_id');
		$model->save();
		return redirect(url('/admin/news/index'));
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
