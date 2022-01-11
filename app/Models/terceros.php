<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terceros extends Model
{
    use HasFactory;
    protected $table = "c_terceros";
    protected $fillable = [
        'razon_social', 'tipo_identificacion_id', 'identificacion', 'fecha_constitucion', 'tipo_sociedad_id', 'direccion', 'telefono', 'correo',
        'ciudad_id', 'departamento', 'barrio', 'actividad_economica_id'
    ];
    protected $primaryKey = 'id';
}
