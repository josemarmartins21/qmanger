<?php

namespace App\Services\contacts\contracts;

use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactInterface
{
    public function getAll(): LengthAwarePaginator;
    public function save($data = []): void;
    public function update(Contact $plan, $data = []): void; 
    /*    public function delete(Contact $plan): void;
    */
}