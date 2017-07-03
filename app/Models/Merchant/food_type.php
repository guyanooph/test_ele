<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Model;

class Food_type extends Model
{
    protected $table = 'food_type';
	
	/**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
	public $timestamps = false;
	
	/**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';
}
