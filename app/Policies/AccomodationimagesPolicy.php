<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accomodationimages;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccomodationimagesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accomodationimages can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allaccomodationimages');
    }

    /**
     * Determine whether the accomodationimages can view the model.
     */
    public function view(User $user, Accomodationimages $model): bool
    {
        return $user->hasPermissionTo('view allaccomodationimages');
    }

    /**
     * Determine whether the accomodationimages can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allaccomodationimages');
    }

    /**
     * Determine whether the accomodationimages can update the model.
     */
    public function update(User $user, Accomodationimages $model): bool
    {
        return $user->hasPermissionTo('update allaccomodationimages');
    }

    /**
     * Determine whether the accomodationimages can delete the model.
     */
    public function delete(User $user, Accomodationimages $model): bool
    {
        return $user->hasPermissionTo('delete allaccomodationimages');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allaccomodationimages');
    }

    /**
     * Determine whether the accomodationimages can restore the model.
     */
    public function restore(User $user, Accomodationimages $model): bool
    {
        return false;
    }

    /**
     * Determine whether the accomodationimages can permanently delete the model.
     */
    public function forceDelete(User $user, Accomodationimages $model): bool
    {
        return false;
    }
}
