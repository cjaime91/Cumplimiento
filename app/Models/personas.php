<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    use HasFactory;
    protected $table = "c_personas";
    protected $fillable = [
        'nombre','tipo_identificacion_id', 'identificacion','cargo_id','direccion','telefono','correo'
    ];
    protected $primaryKey = 'id';
}
