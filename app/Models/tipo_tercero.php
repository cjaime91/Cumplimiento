<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_tercero extends Model
{
    use HasFactory;
    protected $table = "c_tipo_tercero";
    protected $fillable = [
        'tipo_tercero'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
