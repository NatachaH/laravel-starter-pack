<?php

use Illuminate\Database\Seeder;

use App\Models\Permission;
use App\Models\Role;


class AccessControlSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //****** Add Roles ******//
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);

        //****** Add Permissions ******//
        $ids_permission_superadmin = [];
        $ids_permission_admin = [];

        // Role
        $actions = ['view','create','update','delete'];
        foreach ($actions as $action)
        {
            $permission = Permission::create([
                'name' => 'role-'.$action,
                'model' => 'role',
                'action' => $action
            ]);

            $ids_permission_superadmin[] = $permission->id;
        }

        // User
        $actions[] = 'restore';
        $actions[] = 'force-delete';
        foreach ($actions as $action)
        {
            $permission = Permission::create([
                'name' => 'user-'.$action,
                'model' => 'user',
                'action' => $action
            ]);

            $ids_permission_superadmin[] = $permission->id;
            $ids_permission_admin[] = $permission->id;
        }

        //****** Set Permissions to Roles ******//
        $superadmin->permissions()->attach($ids_permission_superadmin);
        $admin->permissions()->attach($ids_permission_admin);

    }
}
