<?php

namespace App\Observers;

use NH\AccessControl\Models\Role;

class RoleObserver
{
    /**
     * Handle the role "created" event.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the role "updated" event.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Handle the role "deleted" event.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the role "restored" event.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the role "force deleted" event.
     *
     * @param  \NH\AccessControl\Models\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
