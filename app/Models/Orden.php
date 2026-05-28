<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orden';
    protected $fillable = [
        'total',
        'usuario_id',
        'estado_orden_id'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function detalles() {
        return $this->hasMany(DetalleOrden::class, 'orden_Id'); 
    }

    public function estado(){
        return $this->belongsTo(EstadoOrden::class, 'estado_orden_id');
    }
}
