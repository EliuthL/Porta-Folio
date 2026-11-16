<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;



class Chat extends Model
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'chats';
    protected $fillable = [
        'post_id',
        'participant_1_id',
        'participant_2_id',
    ];

    public function participant1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'participant_1_id');
    }

    public function participant2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'participant_2_id');
    }
    
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
