<?php

namespace App\Services\signatures\contracts;



interface SignatureInterface
{
    public function getAll();
    public function save($data = []): void;
/*     public function save($data = []): void;
    public function update(Account $account, $data = []): void;
    public function delete(Account $account): void; */
}