<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Attractions;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttractionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the attractions can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allattractions');
    }

    /**
     * Determine whether the attractions can view the model.
     */
    public function view(User $user, Attractions $model): bool
    {
        return $user->hasPermissionTo('view allattractions');
    }

    /**
     * Determine whether the attractions can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allattractions');
    }

    /**
     * Determine whether the attractions can update the model.
     */
    public function update(User $user, Attractions $model): bool
    {
        return $user->hasPermissionTo('update allattractions');
    }

    /**
     * Determine whether the attractions can delete the model.
     */
    public function delete(User $user, Attractions $model): bool
    {
        return $user->hasPermissionTo('delete allattractions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allattractions');
    }

    /**
     * Determine whether the attractions can restore the model.
     */
    public function restore(User $user, Attractions $model): bool
    {
        return false;
    }

    /**
     * Determine whether the attractions can permanently delete the model.
     */
    public function forceDelete(User $user, Attractions $model): bool
    {
        return false;
    }
}
