<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
 	protected $table = 'horas_clases';

    protected $primaryKey = 'id';

    public $timestamps = false;


  protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'horario',
        'estado'
    ];

    protected $guarded = [];


    public function horarios()
    {
        $this->hasMany('App\catalogo\Horario', 'horario', 'hora_id');
    }


}
