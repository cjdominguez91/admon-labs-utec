<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $table = 'ciclos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'año',
        'nciclo',
        'codigo',
        'estatus',
    ];

    protected $guarded = [];

}
