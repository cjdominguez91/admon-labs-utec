<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    //
    protected $table = 'laboratorio';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'ubicacion',
        'imagen',
    ];

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_laboratorio','laboratorio_id','user_id');
    }


    public function horarios()
    {
        return $this->hasMany('App\catalogo\Horario','laboratorio_id');
    }
}
