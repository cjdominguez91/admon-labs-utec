<?php

namespace App;

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
        'user_id',
    ];

protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
