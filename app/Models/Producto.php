<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use SoftDeletes; //Habilita el borrado logico

    protected $table = 'producto';
    protected $fillable = [
        'nombre_joya',
        'descripcion',
        'precio_unitario',
        'stock',
        'stock_bajo',
        'url_imagen',
        'activo',
        'categoria_joya_id',
        'genero_joya_id',
    ];

    //COMPORTAMIENTO DE LOS DATOS
    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'stock' => 'integer',
        'stock_bajo' => 'integer',
        'activo' => 'boolean',
    ];

    //COMPORTAMIENTO DE LAS RELACIONES
    public function categoria(): BelongsTo{
        return $this->belongsTo(CategoriaJoya::class, 'categoria_joya_id');
    }

    public function genero(): BelongsTo{
        return $this->belongsTo(GeneroJoya::class, 'genero_joya_id');
    }
}

