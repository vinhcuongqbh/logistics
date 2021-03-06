<?php

namespace App\Policies;

use App\Models\Khohang;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class KhohangPolicy
{
    use HandlesAuthorization;

        
    public function before(User $user, $ability)
    {
        if ($user->id_loainhanvien === 1) {
            return true;
        }
    }


    public function viewAny(User $user)
    {
        return false;
    }

    

    public function view(User $user)
    {
        return false;
    }
    


    public function create(User $user)
    {
        return false;
    }
    


    public function update(User $user)
    {
        return false;
    }
    


    public function delete(User $user)
    {
        return false;
    }
  


    public function restore(User $user, Khohang $khohang)
    {
        return false;
    }

    

    // public function forceDelete(User $user, Khohang $khohang)
    // {
    //     return $user->id_loainhanvien === 1;
    // }
}
