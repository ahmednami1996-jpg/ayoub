<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'message'];
    public function getCreatedTimeAttribute()
{
    return $this->created_at->format('H \h i \m\i\n');
}
}
