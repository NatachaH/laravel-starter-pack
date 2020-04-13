<?php

namespace App\Observers;

use Nh\AccessControl\Permission;

class PermissionObserver
{
    /**
     * Handle the permission "created" event.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return void
     */
    public function created(Permission $permission)
    {
        //
    }

    /**
     * Handle the permission "updated" event.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return void
     */
    public function updated(Permission $permission)
    {
        //
    }

    /**
     * Handle the permission "deleted" event.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return void
     */
    public function deleted(Permission $permission)
    {
        //
    }

    /**
     * Handle the permission "restored" event.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return void
     */
    public function restored(Permission $permission)
    {
        //
    }

    /**
     * Handle the permission "force deleted" event.
     *
     * @param  \Nh\AccessControl\Permission  $permission
     * @return void
     */
    public function forceDeleted(Permission $permission)
    {
        //
    }
}
