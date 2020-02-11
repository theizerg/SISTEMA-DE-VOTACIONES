<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    private $permissions , $votante_permissions;

    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                 /* administrador */
                                'add_votar',
                                'show_resultados',
                                'imprimir_reporte',
                                'add_users',
                                'edit_users',
                                'show_users',
                                'delete_users'

                                ];
        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->votante_permissions = [
                                'add_votar'

                            ];

    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'administrador']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'votante']);
        $role->givePermissionTo($this->votante_permissions);
    }

}
