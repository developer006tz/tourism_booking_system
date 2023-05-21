<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tourchallenges;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourchallengesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tourchallenges can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list alltourchallenges');
    }

    /**
     * Determine whether the tourchallenges can view the model.
     */
    public function view(User $user, Tourchallenges $model): bool
    {
        return $user->hasPermissionTo('view alltourchallenges');
    }

    /**
     * Determine whether the tourchallenges can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create alltourchallenges');
    }

    /**
     * Determine whether the tourchallenges can update the model.
     */
    public function update(User $user, Tourchallenges $model): bool
    {
        return $user->hasPermissionTo('update alltourchallenges');
    }

    /**
     * Determine whether the tourchallenges can delete the model.
     */
    public function delete(User $user, Tourchallenges $model): bool
    {
        return $user->hasPermissionTo('delete alltourchallenges');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete alltourchallenges');
    }

    /**
     * Determine whether the tourchallenges can restore the model.
     */
    public function restore(User $user, Tourchallenges $model): bool
    {
        return false;
    }

    /**
     * Determine whether the tourchallenges can permanently delete the model.
     */
    public function forceDelete(User $user, Tourchallenges $model): bool
    {
        return false;
    }
}
