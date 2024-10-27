<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the admin can view any models.
     */
    public function viewAny(admin $user): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(admin $user, admin $admin): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(admin $user): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(admin $user, admin $admin): bool
    {
        return true ;
    }

    /**
     * Determine whether the admin can delete the model.
     */
    public function delete(admin $user, admin $admin): bool
    {
        return true ;
    }

    /**
     * Determine whether the admin can restore the model.
     */
    public function restore(admin $user, admin $admin): bool
    {
        return true ;
    }

    /**
     * Determine whether the admin can permanently delete the model.
     */
    public function forceDelete(admin $user, admin $admin): bool
    {
        return true ;
    }
}
