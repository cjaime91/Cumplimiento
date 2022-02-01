<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_identificacion extends Model
{
    use HasFactory;
    protected $table = "c_tipo_identificacion";
    protected $fillable = [
        'tipo_identificacion', 'abreviacion'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
