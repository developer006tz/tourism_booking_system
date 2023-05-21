<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accomodations;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccomodationsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accomodations can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allaccomodations');
    }

    /**
     * Determine whether the accomodations can view the model.
     */
    public function view(User $user, Accomodations $model): bool
    {
        return $user->hasPermissionTo('view allaccomodations');
    }

    /**
     * Determine whether the accomodations can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allaccomodations');
    }

    /**
     * Determine whether the accomodations can update the model.
     */
    public function update(User $user, Accomodations $model): bool
    {
        return $user->hasPermissionTo('update allaccomodations');
    }

    /**
     * Determine whether the accomodations can delete the model.
     */
    public function delete(User $user, Accomodations $model): bool
    {
        return $user->hasPermissionTo('delete allaccomodations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allaccomodations');
    }

    /**
     * Determine whether the accomodations can restore the model.
     */
    public function restore(User $user, Accomodations $model): bool
    {
        return false;
    }

    /**
     * Determine whether the accomodations can permanently delete the model.
     */
    public function forceDelete(User $user, Accomodations $model): bool
    {
        return false;
    }
}
