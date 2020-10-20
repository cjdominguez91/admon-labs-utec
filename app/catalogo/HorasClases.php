<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class HorasClases extends Model
{
    protected $table = 'horas_clases';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'horarario'
        
    ];

    protected $guarded = [];

    public function horario()
    {
        return $this->hasMany('App\catalogo\'horario', 'horas_id');
    }
}
