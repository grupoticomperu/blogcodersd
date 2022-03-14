<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if($user->hasRole('Admin'))
        {
            return true;
        }
    }


    public function misroles(User $user, Role $role)
    {
        if($user->hasRole('Admin') )
        {
            return true;
        }else{
            return false;
        }
        //
    }     

}
