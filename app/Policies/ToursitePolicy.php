<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Toursite;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToursitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the toursite can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list toursites');
    }

    /**
     * Determine whether the toursite can view the model.
     */
    public function view(User $user, Toursite $model): bool
    {
        return $user->hasPermissionTo('view toursites');
    }

    /**
     * Determine whether the toursite can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create toursites');
    }

    /**
     * Determine whether the toursite can update the model.
     */
    public function update(User $user, Toursite $model): bool
    {
        return $user->hasPermissionTo('update toursites');
    }

    /**
     * Determine whether the toursite can delete the model.
     */
    public function delete(User $user, Toursite $model): bool
    {
        return $user->hasPermissionTo('delete toursites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete toursites');
    }

    /**
     * Determine whether the toursite can restore the model.
     */
    public function restore(User $user, Toursite $model): bool
    {
        return false;
    }

    /**
     * Determine whether the toursite can permanently delete the model.
     */
    public function forceDelete(User $user, Toursite $model): bool
    {
        return false;
    }
}
