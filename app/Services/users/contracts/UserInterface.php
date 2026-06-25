<?php

namespace App\Services\users\contracts;

use App\Models\User;

interface UserInterface
{
    public function delete(User $user): void;
}