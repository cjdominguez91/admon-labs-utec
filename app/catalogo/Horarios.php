<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = 'horario';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'inicio',
        'final',
        'dia',
        'ciclo',
        'id_laboratorio',
        'id_materia',
        'timestamp',
        'alerta_seminario'
        
        
    ];

    protected $guarded = [];

    

    public function practica()
    {
        return $this->belongsToMany('App\catalogo\Carrera', 'materia-carreras');
    }
}
