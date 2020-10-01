<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'timestamp'
    ];

    protected $guarded = [];

    public function carreras()
    {
        return $this->hasMany('App\catalogo\Carrera', 'facultad');
    }
}
