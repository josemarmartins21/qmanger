<?php

namespace App\Services\contacts\contracts;



use App\Models\Plan;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactInterface
{
    public function getAll(): LengthAwarePaginator;
    public function save($data = []): void;
 /*    public function delete(Plan $plan): void;
    public function update(Plan $plan, $data = []): void; */
}