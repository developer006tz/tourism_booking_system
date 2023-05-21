<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tourguideagent;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourguideagentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tourguideagent can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list tourguideagents');
    }

    /**
     * Determine whether the tourguideagent can view the model.
     */
    public function view(User $user, Tourguideagent $model): bool
    {
        return $user->hasPermissionTo('view tourguideagents');
    }

    /**
     * Determine whether the tourguideagent can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create tourguideagents');
    }

    /**
     * Determine whether the tourguideagent can update the model.
     */
    public function update(User $user, Tourguideagent $model): bool
    {
        return $user->hasPermissionTo('update tourguideagents');
    }

    /**
     * Determine whether the tourguideagent can delete the model.
     */
    public function delete(User $user, Tourguideagent $model): bool
    {
        return $user->hasPermissionTo('delete tourguideagents');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete tourguideagents');
    }

    /**
     * Determine whether the tourguideagent can restore the model.
     */
    public function restore(User $user, Tourguideagent $model): bool
    {
        return false;
    }

    /**
     * Determine whether the tourguideagent can permanently delete the model.
     */
    public function forceDelete(User $user, Tourguideagent $model): bool
    {
        return false;
    }
}
