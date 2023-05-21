<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Attractionimages;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttractionimagesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the attractionimages can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allattractionimages');
    }

    /**
     * Determine whether the attractionimages can view the model.
     */
    public function view(User $user, Attractionimages $model): bool
    {
        return $user->hasPermissionTo('view allattractionimages');
    }

    /**
     * Determine whether the attractionimages can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allattractionimages');
    }

    /**
     * Determine whether the attractionimages can update the model.
     */
    public function update(User $user, Attractionimages $model): bool
    {
        return $user->hasPermissionTo('update allattractionimages');
    }

    /**
     * Determine whether the attractionimages can delete the model.
     */
    public function delete(User $user, Attractionimages $model): bool
    {
        return $user->hasPermissionTo('delete allattractionimages');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allattractionimages');
    }

    /**
     * Determine whether the attractionimages can restore the model.
     */
    public function restore(User $user, Attractionimages $model): bool
    {
        return false;
    }

    /**
     * Determine whether the attractionimages can permanently delete the model.
     */
    public function forceDelete(User $user, Attractionimages $model): bool
    {
        return false;
    }
}
