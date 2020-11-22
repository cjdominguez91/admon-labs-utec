<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;  
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'email', 'password', 'estatus', 'primer_ingreso', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usersRoles()
    {
        return $this->belongsToMany('App\Role','model_has_roles','model_id');
    }
    
    public function laboratorios()
    {
        return $this->belongsToMany('App\catalogo\Laboratorio','user_laboratorio','user_id', 'laboratorio_id');
    }
}
