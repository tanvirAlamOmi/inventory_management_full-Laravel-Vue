<?php

namespace App\Policies;

use App\User;
use App\LoginAuth;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoginAuthPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any login auths.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the login auth.
     *
     * @param  \App\User  $user
     * @param  \App\LoginAuth  $loginAuth
     * @return mixed
     */
    public function view(User $user, LoginAuth $loginAuth)
    {
        //
    }

    /**
     * Determine whether the user can create login auths.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the login auth.
     *
     * @param  \App\User  $user
     * @param  \App\LoginAuth  $loginAuth
     * @return mixed
     */
    public function update(User $user, LoginAuth $loginAuth)
    {
        //
    }

    /**
     * Determine whether the user can delete the login auth.
     *
     * @param  \App\User  $user
     * @param  \App\LoginAuth  $loginAuth
     * @return mixed
     */
    public function delete(User $user, LoginAuth $loginAuth)
    {
        //
    }

    /**
     * Determine whether the user can restore the login auth.
     *
     * @param  \App\User  $user
     * @param  \App\LoginAuth  $loginAuth
     * @return mixed
     */
    public function restore(User $user, LoginAuth $loginAuth)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the login auth.
     *
     * @param  \App\User  $user
     * @param  \App\LoginAuth  $loginAuth
     * @return mixed
     */
    public function forceDelete(User $user, LoginAuth $loginAuth)
    {
        //
    }
}
