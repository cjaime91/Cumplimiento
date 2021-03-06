<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentes extends Model
{
    use HasFactory;
    protected $table = "c_agentes";
    protected $fillable = [
        'razon_social_a', 'identificacion_a', 'direccion_a', 'telefono_a', 'correo_a', 'ciudad_id_a'
    ];
    protected $primaryKey = 'id';
}
