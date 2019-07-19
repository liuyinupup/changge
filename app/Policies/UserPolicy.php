<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function content_management(User $currentUser,User $user)
    {
        return $currentUser->id === 1 ||$currentUser->is_admin;
    }

    public function user_management(User $currentUser, User $user)
    {
        return $currentUser->id === 1 && $currentUser->id !== $user->id;
    }
    public function founder(User $currentUser)
    {
        return $currentUser->id === 1;
    }
    public function admin(User $currentUser)
    {
        return $currentUser->is_admin;
    }
}