<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaJoya extends Model
{
    use HasFactory, SoftDeletes;

    //Apunta a la tabla real en DBeaver
    protected $table = 'categoria_joya';
    protected $fillable = [
        'nombre_categoria',
    ];

    public function productos() {
        return $this->hasMany(Producto::class, 'categoria_joya_id');
    }
}
