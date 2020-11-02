<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $table = 'practica';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'asistencia',
        'id_carreras',
        'id_horarios',
        
    ];

    protected $guarded = [];

    public function carrera()
    {
        return $this->belongsTo('App\catalogo\Carrera');
    }

    public function horario()
    {
        return $this->belongsTo('App\catalogo\Horario');
    }
}
