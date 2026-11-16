<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\Chat;
use MongoDB\Laravel\Relations\BelongsTo;


class Message extends Model
{
    //
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'messages';
    protected $fillable = ['_id','chat_id', 'user_id', 'text'];

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
}
