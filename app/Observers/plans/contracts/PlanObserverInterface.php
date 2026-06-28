<?php

namespace App\Observers\plans\contracts;

use App\Models\Plan;

interface PlanObserverInterface
{
    public function created(Plan $plan): void;
    public function updated(Plan $plan): void;
    public function deleted(Plan $plan): void;
}