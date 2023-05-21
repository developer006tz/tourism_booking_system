<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Transportation;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransportationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the transportation can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list alltransportation');
    }

    /**
     * Determine whether the transportation can view the model.
     */
    public function view(User $user, Transportation $model): bool
    {
        return $user->hasPermissionTo('view alltransportation');
    }

    /**
     * Determine whether the transportation can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create alltransportation');
    }

    /**
     * Determine whether the transportation can update the model.
     */
    public function update(User $user, Transportation $model): bool
    {
        return $user->hasPermissionTo('update alltransportation');
    }

    /**
     * Determine whether the transportation can delete the model.
     */
    public function delete(User $user, Transportation $model): bool
    {
        return $user->hasPermissionTo('delete alltransportation');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete alltransportation');
    }

    /**
     * Determine whether the transportation can restore the model.
     */
    public function restore(User $user, Transportation $model): bool
    {
        return false;
    }

    /**
     * Determine whether the transportation can permanently delete the model.
     */
    public function forceDelete(User $user, Transportation $model): bool
    {
        return false;
    }
}
