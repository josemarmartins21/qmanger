<?php

namespace App\Services\signatures;

use App\Models\Account;
use App\Models\Plan;
use App\Models\Signature;
use App\Services\signatures\contracts\SignatureInterface;
use Carbon\Carbon;
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
        
            $s = Signature::create([
                'user_id' => Auth::user()->id,
                'end_date' => $endDate,
                'start_date' => $startDate,
                'plan_id' => $data['plan_id'],
                'account_id' => $data['account_id'],
                'price' => $data['discount'] === null ? $plan->price : $plan->price - $data['discount'],
                'status' => $daysToStart > 0 ? false : true,
            ]);

            dd($s);
            

        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
            
        }
    }

}