<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tag;

class TagPolicy
{
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
        //
    // }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        //
    }

    /**
     * Determine whether the user can view the models.
     */
    public function view(?User $user, User $tag): bool {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return $user->hasPermissionTo('create tag') ? true : false;
    }

    /**
     * Determine whether the user can update the models.
     */
    public function update(User $user, Tag $tag) : bool {
        return $user->hasPermissionTo('update tag') ? true : false;
    }

    /**
     * Determine whether the user can delete the models.
     */
    public function delete(User $user, Tag $tag) : bool {
        return $user->hasPermissionTo('delete tag') ? true : false;
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restore(User $user, Tag $tag) : bool {
        //
    }

    /**
     * Determine whether the user can permanently delete the models.
     */
    public function forceDelete(User $user, Tag $tag) : bool {
        //
    }
}
