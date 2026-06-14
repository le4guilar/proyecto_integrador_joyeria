<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;

class Favoritos extends Model
{
    //se le manda la tabla 
    protected $table='Favoritos';

    //campos permitidos para guardad
    protected $fillable = ['usuario_id', 'producto_id'];

    //RElacion: un favorito, pertece a un Producto especifico
    public function producto(){
        return $this->belongsTo(Producto:: class, 'producto_id');
    }
}
