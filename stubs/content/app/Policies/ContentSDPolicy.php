<?php

namespace App\Policies;

use App\Models\{{ UCNAME }};
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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
        return $user->hasAccess('{{ NAME }}', 'view');
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
        return $user->hasAccess('{{ NAME }}', 'view') && !${{ NAME }}->trashed();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess('{{ NAME }}', 'create');
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
        return $user->hasAccess('{{ NAME }}', 'update') && !${{ NAME }}->trashed();
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
        return $user->hasAccess('{{ NAME }}', 'delete') && !${{ NAME }}->trashed() && (!${{ NAME }}->is_protected || $user->has_superpowers);
    }

    /**
     * Determine whether the user can view the trashed models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewTrashed(User $user)
    {
        return $user->hasAccess('{{ NAME }}', ['restore', 'force-delete']);
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
        return $user->hasAccess('{{ NAME }}', 'restore') && ${{ NAME }}->trashed();
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
        return $user->hasAccess('{{ NAME }}', 'force-delete') && ${{ NAME }}->trashed() && (!${{ NAME }}->is_protected || $user->has_superpowers);
    }

    /**
     * Determine whether the user can import the model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function import(User $user)
    {
        return $user->hasAccess('{{ NAME }}', 'import');
    }

    /**
     * Determine whether the user can export the model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function export(User $user)
    {
        return $user->hasAccess('{{ NAME }}', 'export');
    }
}
