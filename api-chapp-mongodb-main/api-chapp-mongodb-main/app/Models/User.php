<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use MongoDB\Laravel\Relations\HasMany;





class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'location',
        'description',
        'url_img_avatar',
        'skills',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con los chats donde el usuario es participant_1
    public function chatsAsParticipant1()
    {
        return $this->hasMany(Chat::class, 'participant_1_id');
    }

    // Relación con los chats donde el usuario es participant_2
    public function chatsAsParticipant2()
    {
        return $this->hasMany(Chat::class, 'participant_2_id');
    }

    // Relación combinada para obtener todos los chats del usuario
    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class, 'participant_1_id', '_id')
                    ->orWhere('participant_2_id', $this->_id);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
