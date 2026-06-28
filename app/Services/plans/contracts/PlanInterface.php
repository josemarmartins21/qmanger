<?php

namespace App\Services\plans\contracts;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Collection;

interface PlanInterface
{
    public function getAll(): Collection;
    public function delete(Plan $plan): void;
}