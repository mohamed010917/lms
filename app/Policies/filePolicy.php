<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use App\Models\file;
use Illuminate\Auth\Access\Response;
use Carbon\Carbon;

class filePolicy
{
    
    public function viewAny(User | admin $user): bool
    {
        return $user->getTable() == "admins" ;
    }

 
    public function view(User | admin $user, file $file): bool
    {
        return false ;
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
    public function update(admin $user, file $file): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(admin $user, file $file): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(admin $user, file $file): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(admin $user, file $file): bool
    {
        return true ;
    }
}
