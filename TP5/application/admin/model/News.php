<?php

namespace app\admin\model;

use think\Model;

class News extends Model
{
	public function getNewsByCateId($cateId){
		$records = $this->where('category_id','=',$cateId)->where('is_checked','=',1)->select();
    	return $records;
	}
	
	public function getNewsByCateName($name){
		$cateModel = new \app\admin\model\Category;
		$object = $cateModel->where('catename','=',$name)->find();
		$records = $this->where('category_id','=',$object->id)->where('is_checked','=',1)->select();
		return $records;		
	}
	
    public function partnerInfo(){
    	return $this->hasOne(\app\admin\model\Partner::class,'id','partner_id');
	}
	
	public function categoryInfo(){
		return $this->hasOne(\app\admin\model\Category::class,'id','category_id');
	}
	
	public function comments(){
		return $this->hasMany(\app\index\model\Comment::class,'news_id','id');
	}
	
}





