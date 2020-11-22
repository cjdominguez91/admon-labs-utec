<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class LaboratorioSoftware extends Model
{
    protected $table = 'laboratorio-software';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_laboratrios',
        'id_software',
    ];

    protected $guarded = [];


     public function software()
    {
    	return $this->hasMany('App\catalogo\Software','id');
    }

}
