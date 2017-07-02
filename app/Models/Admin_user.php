<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class Admin_user extends Model
{
	//use SoftDeletes;

    //
	protected $table = 'admin_user'; //后台管理员表
	//protected $dates = ['deleted_at'];//软删除
}
