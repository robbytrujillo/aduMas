<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
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
    public function view(?User $user, Post $post): bool {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return $user->hasPermissionTo('create post') ? true : false;
    }

    /**
     * Determine whether the user can update the models.
     */
    public function update(User $user, Post $post): bool {
        return $user->hasPermissionTo('updatepost') ? true : false;
    }

    /**
     * Determine whether the user can delete the models.
     */
    public function delete(User $user, Post $post): bool {
        return $user->hasPermissionTo('delete post') ? true : false;
    }

    /**
     * Determine whether the user can restore the models.
     */
    public function restore(User $user, Post $post): bool {
        //
    }

    /**
     * Determine whether the user can permanently delete the models.
     */
    public function forceDelete(User $user, Post $post): bool {
        // 
    }
}
