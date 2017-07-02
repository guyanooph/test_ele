<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "order";//������
	
	/**
     * ��ģ���Ƿ��Զ�ά��ʱ���
     *
     * @var bool
     */
	public $timestamps = false;
	
	/**
     * ģ�͵������ֶα����ʽ��
     *
     * @var string
     */
    protected $dateFormat = 'U';
}