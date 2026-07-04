<?php

namespace App\Services\accounts\contracts;

use App\Models\Account;

interface AccountInterface
{
    public function getAll();
    public function save($data = []): void;
    public function update(Account $account, $data = []): void;
    public function delete(Account $account): void;
}