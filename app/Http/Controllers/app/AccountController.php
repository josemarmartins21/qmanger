<?php

namespace App\Http\Controllers\app;

use App\Facades\enderecos\EnderecoFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\accounts\AccountRequest;
use App\Http\Requests\accounts\AccountUpdateRequest;
use App\Models\Account;
use App\Services\accounts\contracts\AccountInterface;
use Exception;

class AccountController extends Controller
{
    public function __construct(
        private AccountInterface $account,
    )
    {
    }

    public function index()
    {
        $accounts = $this->account->getAll();

        return view('accounts.index', compact('accounts'));
    }

    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    public function create()
    {
        $bairroMunicipios = EnderecoFacade::bairroMunicipios();

        return view('accounts.create', compact('bairroMunicipios'));
    }

    public function store(AccountRequest $request)
    {
        try {
            $validated = $request->validated();
    
            $this->account->save($validated);

            return redirect()
            ->route('accounts.index')
            ->with('success', 'Conta criada com successo!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage()); 
        }
    }

    public function edit(Account $account)
    {
        $bairroMunicipios = EnderecoFacade::bairroMunicipios();
        return view('accounts.edit', compact('account', 'bairroMunicipios'));
    }

    public function update(
        Account $account, 
        AccountUpdateRequest $request
    )
    {
        try {
            $validated = $request->validated();
            
            $this->account->update($account, $validated);

            return redirect()->back()->with('success', 'Contacto actualizado com sucesso!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Account $account)
    {
        try {
            $this->account->delete($account);
            return redirect()->back()->with('success', 'Contacto excluido com sucesso!');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
