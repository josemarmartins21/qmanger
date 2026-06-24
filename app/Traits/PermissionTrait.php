<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait PermissionTrait 
{
    /**
     * @return User
     */
    public function flushPermissions($permissions, User $user): void
    {
        foreach ($permissions as $permission) {
            $user->removePermission($permission);
        }
    }

    /**
     * @return User
     */
    private function givePermissions($permissions, User $user): void
    {

        $wasAdd = [];
        if (!$permissions) throw new \Exception("Selecione ao menos um nível de aceeso!");

        for ($i=0; $i < count($permissions); $i++) { 
            if (!in_array($permissions[$i], $wasAdd)) {
                $user->assignPermission($permissions[$i]);
            }
        }
       
    }
}