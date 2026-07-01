<?php

namespace App\Http\Controllers;

use App\Facades\enderecos\EnderecoFacade;
use App\Http\Requests\accounts\AccountRequest;
use App\Services\accounts\contracts\AccountInterface;
use Exception;
use Illuminate\Http\Request;

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
}
