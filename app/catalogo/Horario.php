<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
 	protected $table = 'horario';

    protected $primaryKey = 'id';

    public $timestamps = false;


  protected $fillable = [
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

    public function laboratorios()
    {
        ////Pendiente hacer Inversa de Relaciones
        return $this->hasMany('App\catalogo\Laboratorio', 'horario');
    }

 
    public function horario()
    {
        return $this->hasMany('App\catalogo\Practica', 'id_horarios');
    }
    public function materias()
    {
        return $this->belongsTo('App\catalogo\Materia', 'id_materia');
    }

    public function horas()
    {
        return $this->hasMany('App\catalogo\HorasClases', 'horario');
    }

}
