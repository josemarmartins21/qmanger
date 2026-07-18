<?php

namespace App\Services\plans;

use App\Helpers\StringHelper;
use App\Models\Plan;
use App\Models\Signature;
use App\Services\plans\contracts\PlanInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use InvalidArgumentException;
use LogicException;

class PlanService implements PlanInterface
{

    public function getAll(): LengthAwarePaginator
    {
        return Plan::select(
            'plans.name', 
            'plans.price', 
            'plans.id', 
            'plans.velocity_download', 
            'plans.description', 
            'users.name AS user_name'
        )
        ->join('users', 'users.id', '=', 'plans.user_id')
        ->orderByDesc('plans.created_at')
        ->paginate(6);
    }

    public function save($data = []): void
    {
        
        try {
            Plan::create([  
                'name' => Str::ucwords($data['name']),
                'price' => $data['price'],
                'description' => Str::ucfirst($data['description']),
                'velocity_download' => $data['velocity_download'],
                'user_id' => Auth::user()->id,
            ]);
    
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

            foreach ($plan->signatures as $signature) {
                if ($signature->status) {
                    throw new Exception("Plano vinculado a uma assinatura activa");
                }
            }

            $plan->delete();

        } catch (LogicException) {
            throw new LogicException('Não foi possível deletar o plano, tente novamente.');
        }
    }

    public static function getTopPlans()
    {
        return Signature::selectRaw(
            "COUNT(plan_id) as number_signatures, 
            plan_id as id",
        )
        ->where('status', true)
        ->groupBy('plan_id')
        ->orderByRaw("COUNT(plan_id) desc")
        ->limit(3)
        ->get();
    }
}