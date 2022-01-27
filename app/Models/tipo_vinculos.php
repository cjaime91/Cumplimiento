<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_vinculos extends Model
{
    use HasFactory;
    protected $table = "c_tipo_vinculos";
    protected $fillable = [
        'vinculo'
    ];
    protected $primaryKey = 'id';
}
