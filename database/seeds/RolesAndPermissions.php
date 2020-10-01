<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       // create permissions
       Permission::create( ['name' => 'create roles'] );
       Permission::create( ['name' => 'read roles'] );
       Permission::create( ['name' => 'edit roles'] );
       Permission::create( ['name' => 'delete roles'] );

       Permission::create( ['name' => 'create users'] );
       Permission::create( ['name' => 'read users'] );
       Permission::create( ['name' => 'edit users'] );
       Permission::create( ['name' => 'delete users'] );

       Permission::create( ['name' => 'create permissions'] );
       Permission::create( ['name' => 'read permissions'] );
       Permission::create( ['name' => 'edit permissions'] );
       Permission::create( ['name' => 'delete permissions'] );

       Permission::create( ['name' => 'create facultades'] );
       Permission::create( ['name' => 'read facultades'] );
       Permission::create( ['name' => 'edit facultades'] );
       Permission::create( ['name' => 'delete facultades'] );

       Permission::create( ['name' => 'create carreras'] );
       Permission::create( ['name' => 'read carreras'] );
       Permission::create( ['name' => 'edit carreras'] );
       Permission::create( ['name' => 'delete carreras'] );

       Permission::create( ['name' => 'create materias-materia-carreras'] );
       Permission::create( ['name' => 'read materia-carreras'] );
       Permission::create( ['name' => 'edit materia-carreras'] );
       Permission::create( ['name' => 'delete materia-carreras'] );

       Permission::create( ['name' => 'create materias-materias'] );
       Permission::create( ['name' => 'read materias'] );
       Permission::create( ['name' => 'edit materias'] );
       Permission::create( ['name' => 'delete materias'] );

       Permission::create( ['name' => 'create horarios'] );
       Permission::create( ['name' => 'read horarios'] );
       Permission::create( ['name' => 'edit horarios'] );
       Permission::create( ['name' => 'delete horarios'] );

       Permission::create( ['name' => 'create practicas'] );
       Permission::create( ['name' => 'read practicas'] );
       Permission::create( ['name' => 'edit practicas'] );
       Permission::create( ['name' => 'delete practicas'] );

       Permission::create( ['name' => 'create software'] );
       Permission::create( ['name' => 'read software'] );
       Permission::create( ['name' => 'edit software'] );
       Permission::create( ['name' => 'delete software'] );

       Permission::create( ['name' => 'create laboratorio-software'] );
       Permission::create( ['name' => 'read laboratorio-software'] );
       Permission::create( ['name' => 'edit laboratorio-software'] );
       Permission::create( ['name' => 'delete laboratorio-software'] );

       Permission::create( ['name' => 'create laboratorios'] );
       Permission::create( ['name' => 'read laboratorios'] );
       Permission::create( ['name' => 'edit laboratorios'] );
       Permission::create( ['name' => 'delete laboratorios'] );


       $role = Role::create( ['name' => 'super admin'] );
       $role->givePermissionTo( Permission::all() );

       $role = Role::create( ['name' => 'administrador'] )
       ->givePermissionTo( ['create laboratorios','read laboratorios','edit laboratorios',
       'delete laboratorios','create horarios','read horarios','edit horarios',
       'delete horarios','create practicas','read practicas','edit practicas',
       'delete practicas'] );
    }
}
