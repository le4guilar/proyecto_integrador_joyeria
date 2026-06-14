<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleOrden extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detalle_orden';
    protected $fillable = [
        'cantidad',
        'subtotal',
        'precio_unitario',
        'orden_id',
        'producto_id',
    ];

    public function orden(){
        return $this->belongsTo(Orden::class, 'orden_id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
