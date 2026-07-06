<?php

namespace App\Services\signatures\contracts;

use App\Models\Signature;



interface SignatureInterface
{
    public function getAll();
    public function save($data = []): void;
    public function update(Signature $signature, $data = []): void;
    public function delete(Signature $signature): void;
    
/*     public function save($data = []): void;
    public function update(Account $account, $data = []): void;
    public function delete(Account $account): void; */
}