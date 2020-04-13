<?php

namespace App\Observers;

use Nh\AccessControl\Role;

class RoleObserver
{
    /**
     * Handle the role "created" event.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the role "updated" event.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Handle the role "deleted" event.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the role "restored" event.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the role "force deleted" event.
     *
     * @param  \Nh\AccessControl\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
