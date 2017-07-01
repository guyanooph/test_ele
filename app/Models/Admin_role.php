<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    //
	protected $dateFormat = 'U';
    public $timestamps = true;//是否自动维护时间戳 
	protected $table = 'admin_role'; //
}
