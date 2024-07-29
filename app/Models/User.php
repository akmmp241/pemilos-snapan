<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;
use Throwable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const TEACHER = 3;
    const STAFF = 4;
    const STUDENT = 5;

    protected $fillable = [
        'name',
        'username',
        'role_id',
        'class',
        'password',
        'password_token'
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'user_id', 'id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->uuid = Uuid::uuid4()->toString();
            } catch (Throwable) {
                abort(500);
            }
        });
    }
}
