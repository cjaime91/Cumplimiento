<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciudades extends Model
{
    use HasFactory;
    protected $table = "c_ciudades";
    protected $fillable = [
        'ciudad', 'pais_id'
    ];
    protected $primaryKey = 'id';
}
