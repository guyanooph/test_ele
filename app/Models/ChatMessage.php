<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    //
    protected $table = "chat_message";

    public $fillable = ['user_id', 'message'];
}
