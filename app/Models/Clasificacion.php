<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificacion';

    protected $fillable = [
        'nombre_clasificacion'
    ];
}
