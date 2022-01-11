<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paises extends Model
{
    use HasFactory;
    protected $table = "c_paises";
    protected $fillable = [
        'pais', 'abreviacion', 'calificacion'
    ];
    protected $primaryKey = 'id';
}
