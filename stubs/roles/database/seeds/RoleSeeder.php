<?php

use Illuminate\Database\Seeder;

use NH\AccessControl\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create the Superadmin
        $superadmin = Role::create([
            'name' => 'superadmin'
        ]);

        // Create the Admin
        $superadmin = Role::create([
            'name' => 'admin'
        ]);
    }
}
