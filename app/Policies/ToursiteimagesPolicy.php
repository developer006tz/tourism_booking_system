<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Toursiteimages;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToursiteimagesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the toursiteimages can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list alltoursiteimages');
    }

    /**
     * Determine whether the toursiteimages can view the model.
     */
    public function view(User $user, Toursiteimages $model): bool
    {
        return $user->hasPermissionTo('view alltoursiteimages');
    }

    /**
     * Determine whether the toursiteimages can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create alltoursiteimages');
    }

    /**
     * Determine whether the toursiteimages can update the model.
     */
    public function update(User $user, Toursiteimages $model): bool
    {
        return $user->hasPermissionTo('update alltoursiteimages');
    }

    /**
     * Determine whether the toursiteimages can delete the model.
     */
    public function delete(User $user, Toursiteimages $model): bool
    {
        return $user->hasPermissionTo('delete alltoursiteimages');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete alltoursiteimages');
    }

    /**
     * Determine whether the toursiteimages can restore the model.
     */
    public function restore(User $user, Toursiteimages $model): bool
    {
        return false;
    }

    /**
     * Determine whether the toursiteimages can permanently delete the model.
     */
    public function forceDelete(User $user, Toursiteimages $model): bool
    {
        return false;
    }
}
