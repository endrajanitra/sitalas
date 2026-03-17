<?php

namespace App\Policies;

use App\Models\AsistenBiro;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AsistenBiroPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isStaf();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AsistenBiro $asistenBiro): bool
    {
        return $user->isStaf();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isStaf();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AsistenBiro $asistenBiro): bool
    {
        return $user->isStaf();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AsistenBiro $asistenBiro): bool
    {
        return $user->isStaf();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AsistenBiro $asistenBiro): bool
    {
        return $user->isStaf();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AsistenBiro $asistenBiro): bool
    {
        return $user->isStaf();
    }
}
