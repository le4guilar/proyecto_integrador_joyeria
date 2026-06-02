<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carrito';
    protected $fillable = [
        'total',
        'usuario_id',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function detalles() {
        return $this->hasMany(DetalleCarrito::class, 'carrito_id'); 
    }
}
