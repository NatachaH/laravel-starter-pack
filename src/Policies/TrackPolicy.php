<?php

namespace Nh\StarterPack\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use App\Models\Track;

class TrackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can access to a model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function before(User $user)
    {
        //return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissions('activity-log');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function view(User $user, Track $track)
    {
        return $user->hasPermissions('activity-log');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function update(User $user, Track $track)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function delete(User $user, Track $track)
    {
        return $user->has_superpowers;
    }

}
