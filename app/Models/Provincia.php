<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function Termwind\renderUsing;

class Provincia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'provincia';
    protected $fillable = [
        'nombre_provincia',
    ];

    public function ciudades(){
        return $this->hasMany(Ciudad::class, 'provincia_id');
    }
}
