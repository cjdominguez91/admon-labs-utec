<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'name',
        'guard_name'
    ];

    protected $guarded = [];

    public function permissionsRoles()
    {
        return $this->belongsToMany('App\Role', 'role_has_permissions', 'permission_id');
    }
}
