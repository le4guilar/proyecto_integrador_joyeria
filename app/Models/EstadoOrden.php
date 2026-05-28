<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoOrden extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estado_orden';
    protected $fillable = [
        'nombre_estado_orden',
    ];

    public function ordenes(){
        return $this->hasMany(Orden::class, 'estado_orden_id');
    }
}
