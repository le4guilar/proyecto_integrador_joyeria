<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'consulta';
    protected $fillable = [
        'asunto',
        'mensaje',
        'estado',
        'usuario_id',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    
}
