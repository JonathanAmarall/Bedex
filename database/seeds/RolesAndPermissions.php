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
        //reset cached
        app()['cache']->forget('spatie.permission.cache');


        //Permission for User
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        //Permission for Role
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        //Permission for Permission
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permissions']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        //Permission proposal
        Permission::create(['name' => 'read all']);
        Permission::create(['name' => 'read my']);


        //criando roles e permissoes
        $role = Role::create(['name' => 'correspondente']);
        $role->givePermissionTo('read users');
        $role->givePermissionTo('read my');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());


    }
}
