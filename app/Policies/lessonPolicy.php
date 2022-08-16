<?php

namespace App\Policies;

use App\Models\User;
use App\Models\lesson;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Response;

class lessonPolicy
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
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, lesson $lesson)
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

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, lesson $lesson)
    {
        return $user->id === $lesson->user_id || $user->role === 'admin'
        ? Response::allow()
        : Response::deny('you do not have premission');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, lesson $lesson)
    {
        return $user->id === $lesson->user_id || $user->role === 'admin'
        ? Response::allow()
        : Response::deny('you do not have premission');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, lesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, lesson $lesson)
    {
        //
    }
}
