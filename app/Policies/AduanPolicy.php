<?php

namespace App\Policies;

use App\Models\Aduan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AduanPolicy
{
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Aduan $aduan): bool {
        //
    }

     /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return $user->hasPermissionTo('create aduan') ? true : false; 
 
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Aduan $aduan): bool {
        return $user->hasPermissionTo('update aduan') ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Aduan $aduan): bool {
        return $user->hasPermissionTo('delete aduan') ? true : false;
    }

     /**
     * Determine whether the user can restore the model.
     */
    public  function restore(User $user, Aduan $aduan): bool {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Aduan $aduan): bool {
        //
    }
}
