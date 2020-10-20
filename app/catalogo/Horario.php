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

    public function laboratorio()
    {
        return $this->belongsTo('App\catalogo\Laboratorio');
    }

    public function materias()
    {
        ////Pendiente hacer Inversa de Relaciones
        return $this->hasOne('App\catalogo\Materia', 'horario');
    }


}
