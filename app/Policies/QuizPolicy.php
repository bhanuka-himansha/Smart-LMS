<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Quiz;
use App\Models\User;

class QuizPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('view quiz');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create quiz');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('edit quiz');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('delete quiz');
    }
}
