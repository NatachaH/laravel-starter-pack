<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\{{ UCNAME }};

class {{ UCNAME }}Policy
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
        return $user->hasAccess('{{ NAME }}','view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function view(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess('{{ NAME }}','create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function update(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\{{ UCNAME }}  ${{ NAME }}
     * @return mixed
     */
    public function delete(User $user, {{ UCNAME }} ${{ NAME }})
    {
        return $user->hasAccess('{{ NAME }}','delete');
    }

}