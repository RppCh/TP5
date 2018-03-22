<?php

namespace app\index\model;

use think\Model;

class Comment extends Model
{
    //
    public function userInfo(){
    	return $this->belongsTo(\app\index\model\Users::class,'user_id','id');
    }
}
