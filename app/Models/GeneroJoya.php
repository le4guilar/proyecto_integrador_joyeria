<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneroJoya extends Model
{
    use HasFactory, SoftDeletes;

    //Apunta a la tabla real en DBeaver
    protected $table = 'genero_joya';
    protected $fillable = [
        'nombre_genero',
    ];

    public function productos() {
        return $this->hasMany(Producto::class, 'genero_joya_id');
    }
}