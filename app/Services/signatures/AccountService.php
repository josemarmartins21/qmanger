<?php

namespace App\Services\accounts;

use App\Facades\enderecos\EnderecoFacade;
use App\Models\Account;
use App\Models\Endereco;
use App\Services\accounts\contracts\AccountInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use LogicException;

class AccountService implements AccountInterface
{
    public function getAll()
    {
        $accounts = Account::select(
            'name', 
            'number_account', 
            'type', 
            'is_active',
            'id',
        )->orderByDesc('created_at')
        ->paginate(5);

        return $accounts;
    }

    public function save($data = []): void
    {
        try {
            $endereco = EnderecoFacade::create($data);
     
            $data['number_account'] = $this->createNumberAccount(Str::ucwords($data['name']));
     
             Account::create([
                 'name' => Str::ucwords($data['name']),
                 'type' => Str::ucfirst($data['type']),   
                 'number_account' => $data['number_account'],
                 'user_id' => Auth::user()->id,
                 'endereco_id' => $endereco->id,
                 'is_active' => (bool) $data['is_active'],
                 'activation_date' => (bool) $data['is_active'] ? date('Y-m-d') : null,
             ]);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            
        }

    }

    private function createNumberAccount(string $nameAccount): string
    {
        $account = Account::orderByDesc('created_at')->first('id');
        $lastId = $account ? $account->id + 1 : 0 + 1;
        
        $nameAccount = Str::remove(' ', $nameAccount);
        $lengthId = strlen((string) $lastId);

        $numberAccount = Str::padRight(
            $nameAccount, 
            strlen($nameAccount) + 7 + $lengthId,
            '-CONT-0' . $lastId,
        );

        return $numberAccount;
    }

    public function update(
        Account $account, 
        $data = []
    ): void
    {
        try {

            $endereco = Endereco::find($account->endereco_id);
            EnderecoFacade::update($endereco, $data);
    
            $account->updateOrFail($data);       

        } catch (\Throwable) {
            throw new Exception("Algo deu errado, tente novamente.");
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function delete(Account $account): void
    {
        try {
            
            $enderecoId = $account->endereco_id;

            $account->delete();
            Endereco::find($enderecoId)->delete();


        } catch (LogicException) {
            throw new Exception("Algo deu errado, tente novamente.");
        }
    }

}