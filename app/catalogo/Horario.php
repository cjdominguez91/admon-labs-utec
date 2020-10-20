<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
 	protected $table = 'horario';

    protected $primaryKey = 'id';

    public $timestamps = false;


  protected $fillable = [
        'dia',
        'hora_id',
        'materia_id',
        'ciclo_id',
        'laboratorio_id',
        'alerta_seminarios',
        'clave',
        'timestamp',
        'estado'
    ];

    protected $guarded = [];

   /* public function laboratorios()
    {
        ////Pendiente hacer Inversa de Relaciones
        return $this->belongsTo('App\catalogo\Laboratorio', 'horario', 'id');
    }*/

    public function laboratorio()
    {
        return $this->belongsTo('App\catalogo\Laboratorio');
    }

    public function materia()
    {
        return $this->belongsTo('App\catalogo\Materia');
    }

    public function hora()
    {
        return $this->belongsTo('App\catalogo\Hora');
    }

    public function ciclo()
    {
        return $this->belongsTo('App\catalogo\Ciclo');
    }

}
