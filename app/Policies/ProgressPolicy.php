<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Progress;
use App\Models\User;

class ProgressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Progress $progress)
    {
        return $user->hasPermissionTo('view progress');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create progress');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Progress $progress)
    {
        return $user->hasPermissionTo('edit progress');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Progress $progress)
    {
        return $user->hasPermissionTo('delete progress');
    }
}
