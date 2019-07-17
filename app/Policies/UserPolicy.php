<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability){
        if ($user->isAdmin()) {
           return true;
        }
    }
    //usuario actual //consulta db
     public function myEdit(User $authUser, User $user){
        return $authUser->id===$user->id;
    }
    public function myUpdate(User $authUser, User $user ){
         return $authUser->id===$user->id;
    }
     public function myDelete(User $authUser, User $user ){
         return $authUser->id===$user->id;
    }
}
