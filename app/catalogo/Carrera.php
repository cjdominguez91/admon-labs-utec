<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'facultad',
        'timestamp'
    ];

    protected $guarded = [];

    public function facultades()
    {
        return $this->belongsTo('App\catalogo\Facultad', 'facultad', 'id');
    }
    public function practicas()
    {
        return $this->hasMany('App\catalogo\Practica', 'id_carreras');
    }
    public function carreraMaterias()
    {
        return $this->belongsToMany('App\catalogo\Materia','materia-carreras');
    }



}
