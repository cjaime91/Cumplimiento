<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividad_economica extends Model
{
    use HasFactory;
    protected $table = "c_actividades_economicas";
    protected $fillable = [
        'codigo', 'actividad', 'descripcion'
    ];
    protected $primaryKey = 'id';
}
