<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use App\Models\course;
use Illuminate\Auth\Access\Response;

class coursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User | admin $user): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User | admin $user, course $course): bool
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
    public function update(admin $user, course $course): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(admin $user, course $course): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(admin $user, course $course): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(admin $user, course $course): bool
    {
        return true ;
    }
}
