<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $table = 'biblioteca';

    protected $fillable = [
        'nombre_libro', 'fecha_pub', 'id_autor', 'id_clasificacion', 'url_libro', 'url_thumbnail'
    ];

    public function autor()
    {
        return $this->belongsTo('App\Models\Autor', 'id_autor');
    }

    public function clasificacion()
    {
        return $this->belongsTo('App\Models\Clasificacion', 'id_clasificacion');
    }
}
