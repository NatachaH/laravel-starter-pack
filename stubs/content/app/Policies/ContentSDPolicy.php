<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use App\Models\{{ UCNAME }};

class {{ UCNAME }}Policy
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
        return $user->hasAccess('{{ NAME }}','view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function view(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','view') && !${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess('{{ NAME }}','create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function update(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','update') && !${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function delete(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','delete') && !${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can view the trashed models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewTrashed(User $user)
    {
        return $user->hasAccess('{{ NAME }}', ['restore','force-delete']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function restore(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','restore') && ${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function forceDelete(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','force-delete') && ${{ NAME }}->trashed();
    }
}
