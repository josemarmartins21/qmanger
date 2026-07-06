<?php

namespace App\Services\signatures;

use App\Exceptions\FailOnDeleteException;
use App\Exceptions\SignatureCantBeUpdateException;
use App\Models\Account;
use App\Models\Plan;
use App\Models\Signature;
use App\Services\signatures\contracts\SignatureInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class SignatureService implements SignatureInterface
{
    public function getAll()
    {
        $attributes = [
            'accounts.name as account_name', 
            'accounts.number_account', 
            'plans.name as plan_name', 
            'signatures.id', 
            'signatures.start_date', 
            'signatures.end_date', 
            'signatures.status', 
            'signatures.price', 
            'signatures.discount',
        ];

        return Signature::select($attributes)
        ->join('accounts', 'signatures.account_id', '=', 'accounts.id')
        ->join('plans', 'signatures.plan_id', '=', 'plans.id')
        ->orderByDesc('signatures.id')
        ->paginate(6);
    }

    public function save($data = []): void
    {
        try {
            $account = Account::find($data['account_id']);
            $plan = Plan::find($data['plan_id']);

            $startDate = Carbon::parse($data['start_date']);

            foreach ($account->signatures as $signature) {
                if ($startDate->diffInDays($signature->end_date) >= 0) {
                    throw new \Exception("Esta conta possui uma assinatura que ainda não excedeu a data de início fornecida. Crie as assinaturas da data mais recente para a mais futura.");
                }
            }

            if ($data['discount'] >= $plan->price) {
                throw new \Exception("O desconto não pode ser maior ou igual ao preço do plano!");
            }

            $endDate = $startDate->addMonth()->format('Y-m-d');
            $startDate = $data['start_date'];

            $daysToStart = Carbon::parse($data['start_date'])->diffInDays(date('Y-m-d'), true);
        
            Signature::create([
                'user_id' => Auth::user()->id,
                'end_date' => $endDate,
                'start_date' => $startDate,
                'plan_id' => $data['plan_id'],
                'account_id' => $data['account_id'],
                'price' => $data['discount'] === null ? $plan->price : $plan->price - $data['discount'],
                'status' => $daysToStart > 0 ? false : true,
                'plan_name' => $plan->name,
            ]);

        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
            
        }
    }

    public function update(Signature $signature, $data = []): void
    {
        try {
            $plan = Plan::find($data['plan_id']);

            $startDate = Carbon::parse($data['start_date']);
            
            if (Carbon::today()->diffInDays($startDate, true) > 0 AND $data['status']) {
                $message = Carbon::today()
                ->diffInDays($startDate, true) === 1 ? 'Falta um dia'  : 'Ainda faltam dias';

                throw new SignatureCantBeUpdateException($message . " para a data definida para o início do plano, então não será possivel activar a assinatura");
            }

            $endDate = Carbon::parse($data['start_date'])->addMonth();

            $signature->updateOrFail([
                'account_id' => $data['account_id'],
                'plan_id' => $data['plan_id'],
                'plan_name' => $plan->name,
                'price' => $plan->price - $data['discount'],
                'start_date' => $data['start_date'],
                'start_end' => $endDate->format('Y-m-d'),
                'status' => $data['status'],
                'discount' => $data['discount'],
            ]);

        } catch (SignatureCantBeUpdateException $e) {
            throw new Exception($e->getMessage());
        } catch (\Throwable) {
            throw new Exception("Algo deu errado, tente novamente!"); 
        }
    }

    public function delete(Signature $signature): void
    {
        try {
            
            $deleted = $signature->deleteOrFail();
            if (! $deleted) {
                throw new FailOnDeleteException("Falha ao deleter a assinatura, tente novamente.");
            }

        } catch (\Throwable) {
            throw new Exception("Algo deu errado, tente novamente!");
        } catch (FailOnDeleteException $e) {
            throw new \Exception($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}