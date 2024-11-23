<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Pktharindu\NovaPermissions\Models\Role as RoleModel;
use Pktharindu\NovaPermissions\Nova\Role as NovaRole;
use Pktharindu\NovaPermissions\Role;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        return $user->hasPermissionTo('view user') || $model->id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        return $user->hasPermissionTo('edit user') || $model->id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        return $user->hasPermissionTo('delete user') && $user->id !== $model->id;
    }

    /**
     * Determine if the given role can be detached from the user.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $user
     * @param  \Pktharindu\NovaPermissions\Role  $role
     * @return bool
     */
    public function detachRole(User $authUser, User $user, Role $role)
    {
        // Prevent user from detaching their own role
        if ($authUser->id === $user->id && $user->roles->contains($role)) {
            return false;
        }

        // Allow detaching for other users
        return true;
    }
}
