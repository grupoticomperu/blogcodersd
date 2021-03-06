<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Auth\Access\HandlesAuthorization;


class ClientePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */



    public function before($user)
    {
        if($user->hasRole('Admin'))
        {
            return true;
        }
    }



    public function misclientes(User $user, Cliente $cliente)
    {
        if($user->id == $cliente->user_id){
            return true;
        }else{
            return false;
        }
        //
    }     


     

}
