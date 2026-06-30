<?php

namespace App\Services\users;

use App\Exceptions\UnauthorizedUserException;
use App\Models\User;
use App\Services\users\contracts\UserInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements UserInterface
{
    public function delete(User $user): void
    {
        if (! Auth::user()->is_master AND $user->hasPermission('super-admin')) {
            throw new UnauthorizedUserException("Essa ação só é permitida a utilizadores master");
        }

        if (!Auth::user()->hasPermission('super-admin') AND $user->hasPermission('admin')) {
           throw new UnauthorizedUserException("Essa ação só é permitida a utilizadores master"); 
        }

        $user->delete();
    }
}