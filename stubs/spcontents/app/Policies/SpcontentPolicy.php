<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\{{ UNAME }};

class {{ UNAME }}Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can access to a model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function before(User $user)
    {
        //return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the trashed models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewTrashed(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function view(User $user, {{ UNAME }} ${{ NAME }})
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function update(User $user, {{ UNAME }} ${{ NAME }})
    {
        return !${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function delete(User $user, {{ UNAME }} ${{ NAME }})
    {
        return !${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function restore(User $user, {{ UNAME }} ${{ NAME }})
    {
        return ${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function forceDelete(User $user, {{ UNAME }} ${{ NAME }})
    {
        return ${{ NAME }}->trashed();
    }
}
