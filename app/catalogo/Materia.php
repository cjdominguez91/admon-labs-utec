<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'timestamp'
    ];

    protected $guarded = [];

    public function materiaCarreras()
    {
        return $this->belongsToMany('App\catalogo\Carrera', 'materia-carreras');
    }


    public function horarios()
    {
        $this->hasMany('App\catalogo\Horario', 'horario', 'materia_id');
    }
}
