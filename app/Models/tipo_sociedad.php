<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_sociedad extends Model
{
    use HasFactory;
    protected $table = "c_tipo_sociedad";
    protected $fillable = [
        'tipo_sociedad', 'abreviacion', 'calificacion'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
