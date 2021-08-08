<?php

namespace App\Policies;

use App\Models\Khohang;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class KhohangPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

    // public function before(User $user, $ability)
    // {
    //     if ($user->id_loainhanvien === 1) {
    //         return true;
    //     }
    // }


    public function viewAny(User $user)
    {
        return $user->id_loainhanvien === 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Khohang  $khohang
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->id_loainhanvien === 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id_loainhanvien === 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Khohang  $khohang
     * @return mixed
     */
    public function update(User $user, Khohang $khohang)
    {
        return $user->id_loainhanvien === 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Khohang  $khohang
     * @return mixed
     */
    public function delete(User $user, Khohang $khohang)
    {
        return $user->id_loainhanvien === 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Khohang  $khohang
     * @return mixed
     */
    public function restore(User $user, Khohang $khohang)
    {
        return $user->id_loainhanvien === 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Khohang  $khohang
     * @return mixed
     */
    public function forceDelete(User $user, Khohang $khohang)
    {
        return $user->id_loainhanvien === 1;
    }
}
