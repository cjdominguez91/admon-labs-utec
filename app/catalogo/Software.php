<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = 'software';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'nombre',
        'timestamp'
    ];

    protected $guarded = [];


    public function laboratorios()
    {
        return $this->belongsToMany('App\catalogo\Laboratorio','laboratorio-software', 'id_software', 'id_laboratorios');
    }

}
