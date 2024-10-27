<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use Illuminate\Auth\Access\Response;

class UserPolicy
{  
    public function viewAny(admin | user  $user): bool
    {
        return true ;
    }

 
    public function view(admin $user, User $model): bool
    {
        return true ;
    }

    public function create(admin $user): bool
    {
        return true ;
    }


    public function update(admin $user, User $model): bool
    {
        return true ;
    }

 
    public function delete(admin $user, User $model): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(admin $user, User $model): bool
    {
        return true ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(admin $user, User $model): bool
    {
        return true ;
    }
}
