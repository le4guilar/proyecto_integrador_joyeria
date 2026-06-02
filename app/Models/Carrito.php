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
        'cantidad',
        'producto_id',
        'usuario_id',
    ];

    public function carrito(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}

