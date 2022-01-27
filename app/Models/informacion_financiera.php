<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informacion_financiera extends Model
{
    use HasFactory;
    protected $table = "c_inf_fin";
    protected $fillable = [
        'tercero_id', 'anio', 'agente_id', 'anio_a', 'activo_cte', 'activo_total', 'pasivo_cte', 'pasivo_total',
        'utilidad_oper', 'patrimonio', 'inventario', 'ingresos_mensuales', 'egresos_mensuales', 'activos', 'pasivos'
    ];
    protected $primaryKey = 'id';
}
