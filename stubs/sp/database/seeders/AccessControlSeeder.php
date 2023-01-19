<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Nh\AccessControl\Models\Permission;

class AccessControlSeeder extends Seeder
{
    /**
     * Array of permissions ids for admin
     *
     * @var array
     */
    private $ids_permission_admin;

    /**
     * Array of permissions ids for superadmin
     *
     * @var array
     */
    private $ids_permission_superadmin;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //****** Create the roles ******//
        $superadmin = Role::create(['guard' => 'superadmin', 'name' => 'Superadmin']);
        $admin = Role::create(['guard' => 'admin', 'name' => 'Admin']);

        //****** Create the permissions ******//

        $actions = ['view', 'create', 'update', 'delete'];

        // Role
        $this->createPermissions($actions, 'role');

        //****** Create the permissions with soft/force delete and restore ******//

        $actions[] = 'restore';
        $actions[] = 'force-delete';

        // User
        $this->createPermissions($actions, 'user', true);

        //****** Create simple permissions ******//

        // Activity Log
        $activityLog = Permission::create([
            'name' => 'activity-log',
            'model' => null,
            'action' => null,
        ]);
        $this->ids_permission_superadmin[] = $activityLog->id;

        //****** Set Permissions to Roles ******//
        $superadmin->permissions()->attach($this->ids_permission_superadmin);
        $admin->permissions()->attach($this->ids_permission_admin);
    }

    /**
     * Create all permissions for model
     *
     * @param  array  $actions
     * @param  string  $model
     * @param  bool  $forAdmin
     * @return void
     */
    private function createPermissions($actions, $model, $forAdmin = false)
    {
        foreach ($actions as $action) {
            $permission = Permission::create([
                'name' => $model.'-'.$action,
                'model' => $model,
                'action' => $action,
            ]);

            if ($forAdmin) {
                $this->ids_permission_admin[] = $permission->id;
            }

            $this->ids_permission_superadmin[] = $permission->id;
        }
    }
}
