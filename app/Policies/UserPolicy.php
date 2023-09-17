<?php

namespace App\Policies;

use App\Models\BlogPost;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function medicalPersonelOnly(User $user): bool
    {
        return ($user->role=='admin') || ($user->role=='doctor') || ($user->role=='assistant');
    }

    public function adminAndDoctorOnly(User $user): bool
    {
        return ($user->role=='admin') || ($user->role=='doctor');
    }

    public function adminOnly(User $user): bool
    {
        return ($user->role=='admin');
    }
    public function clientAndAdminOnly(User $user): bool
    {
        return ($user->role=='client') || ($user->role=='admin');
    }

    public function clientOnly(User $user): bool
    {
        return ($user->role=='client');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
