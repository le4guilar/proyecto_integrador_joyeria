<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rol';

    protected $fillable = ['nombre_rol'];


    public function usuarios() {
        return $this->hasMany(User::class, 'rol_id');
    }
}
