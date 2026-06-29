<?php

namespace App\Services\plans;

use App\Helpers\StringHelper;
use App\Models\Plan;
use App\Observers\plans\contracts\PlanObserverInterface;
use App\Services\plans\contracts\PlanInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use InvalidArgumentException;
use LogicException;

class PlanService implements PlanInterface
{
    private $observers = [];
    private $newData;
    private $oldData;

    public function getAll(): LengthAwarePaginator
    {
        return Plan::select('name', 'price', 'id', 'velocity_download', 'description')
        ->orderByDesc('created_at')
        ->paginate(6);
    }

    public function save($data = []): void
    {
        
        try {
            Plan::create([  
                'name' => Str::ucwords($data['name']),
                'price' => $data['price'],
                'instalation_tax' => $data['instalation_tax'],
                'description' => Str::ucfirst($data['description']),
                'velocity_download' => $data['velocity_download'],
                'user_id' => Auth::user()->id,
            ]);
    
            // $this->newData = $plan;
           // $this->notifyObservers();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update(Plan $plan, $data = []): void
    {
        try {
            $invalids = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
            ];

            StringHelper::doesntContain($data['name'], $invalids);

            $plan->update([
                'name' => Str::ucwords($data['name']),
                'price' => $data['price'],
                'instalation_tax' => $data['instalation_tax'],
                'description' => Str::ucfirst($data['description']),
                'velocity_download' => $data['velocity_download'],
            ]);

        } catch (InvalidArgumentException $e) {
            throw new \Exception($e->getMessage() . " números");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
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