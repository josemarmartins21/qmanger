<?php

namespace App\Services\accounts\contracts;


interface AccountInterface
{
    public function getAll();
    public function save($data = []): void;
}