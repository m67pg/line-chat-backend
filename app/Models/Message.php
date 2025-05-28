<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'created_at',
    ];

   /**
     * メッセージ送信者のユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
