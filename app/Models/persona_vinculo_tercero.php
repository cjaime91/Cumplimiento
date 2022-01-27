<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona_vinculo_tercero extends Model
{
    use HasFactory;
    protected $table = "c_persona_vinculo_tercero";
    protected $fillable = [
        'persona_id', 'tercero_id','agente_id','vinculo_id'
    ];
    public $timestamps = false;
}
