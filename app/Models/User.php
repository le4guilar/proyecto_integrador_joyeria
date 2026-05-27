<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['nombre', 'email', 'password', 'domicilio_id', 'rol_id'];

    protected $hidden = ['password', 'remember_token'];

    public function rol():BelongsTo {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function domicilio():BelongsTo {
        return $this->belongsTo(Domicilio::class, 'domicilio_id');
    }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
