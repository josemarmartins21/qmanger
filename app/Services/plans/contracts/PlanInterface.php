<?php

namespace App\Services\plans\contracts;

use App\Models\Plan;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlanInterface
{
    public function getAll(): LengthAwarePaginator;
    public function delete(Plan $plan): void;
    public function save($data = []): void;
    public function update(Plan $plan, $data = []): void;
}