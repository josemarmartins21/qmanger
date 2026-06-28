<?php

namespace App\Services\plans;

use App\Models\Plan;
use App\Observers\plans\contracts\PlanObserverInterface;
use App\Services\plans\contracts\PlanInterface;
use Illuminate\Database\Eloquent\Collection;
use LogicException;

class PlanService implements PlanInterface
{
    private $observers = [];
    private $newData;
    private $oldData;

    public function getAll(): Collection
    {
        return Plan::select('name', 'price', 'id', 'velocity_download', 'description')
        ->orderByDesc('created_at')
        ->get();
    }

    public function delete(Plan $plan): void
    {
        try {
            
            $this->oldData = $plan;

            $plan->delete();

            $this->notifyObservers();

        } catch (LogicException) {
            throw new LogicException('Não foi possível deletar o plano, tente novamente.');
        }
    }

    public function addObservers(PlanObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    private function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->deleted($this->oldData);
        }
    }
}