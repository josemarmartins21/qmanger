<?php

namespace App\Observers\plans;

use App\Models\LogDml;
use App\Models\Plan;
use App\Observers\plans\contracts\PlanObserverInterface;
use Illuminate\Support\Facades\Auth;

class LoggerObserver implements PlanObserverInterface
{
    public function created(Plan $plan): void
    {

    }

    public function updated(Plan $plan): void
    {
   
    }

    public function deleted(Plan $plan): void
    {
        LogDml::create([
            'operation' => 'DELETE',
            'table' => 'planos',
            'new_data' => $plan,
            'old_data' => $plan,
            'user_name' => Auth::user()->name,
            'user_id' => Auth::user()->id,
        ]);
    }
}