<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentes extends Model
{
    use HasFactory;
    protected $table = "c_agentes";
    protected $fillable = [
        'razon_social', 'identificacion', 'direccion', 'telefono', 'correo', 'ciudad_id'
    ];
    protected $primaryKey = 'id';
}
