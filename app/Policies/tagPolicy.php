<?php

namespace App\Policies;

use App\Models\User;
use App\Models\tag;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Response;

class tagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === 'admin'
        ? Response::allow()
        : Response::deny('you do not have premission');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, tag $tag)
    {
        return $user->role === 'admin'
        ? Response::allow()
        : Response::deny('you do not have premission');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, tag $tag)
    {
        return $user->role === 'admin'
        ? Response::allow()
        : Response::deny('you do not have premission');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, tag $tag)
    {
        //
    }
}
