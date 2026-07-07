<?php

namespace App\Http\Controllers\app;



use App\Http\Controllers\Controller;
use App\Http\Requests\signatures\SignatureRequest;
use App\Http\Requests\signatures\SignatureUpdateRequest;
use App\Models\Account;
use App\Models\Plan;
use App\Models\Signature;
use App\Services\signatures\contracts\SignatureInterface;
use Exception;

class SignatureController extends Controller
{
    public function __construct(
        private SignatureInterface $signatureService
    )
    {
    }

    public function index()
    {
        $signatures = $this->signatureService->getAll();
        return view('signatures.index', compact('signatures'));
    }

    public function create()
    {
        $plans = Plan::select(
            'id', 
            'price', 
            'name'
        )
        ->orderBy('name')->get();

        $accounts = Account::select(
            'number_account', 
            'id', 
            'is_active'
        )->orderBy('name')->get();

        return view('signatures.create', compact('plans', 'accounts'));
    }

    public function store(SignatureRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->signatureService->save($validated);

            return redirect()->route('signatures.index')->with('success', 'Assinatura criada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Signature $signature)
    {
        $plans = Plan::select(
            'id', 
            'price', 
            'name'
        )
        ->orderBy('name')->get();

        $accounts = Account::select(
            'number_account', 
            'id', 
            'is_active'
        )->orderBy('name')->get();

        return view('signatures.edit', compact('signature', 'plans', 'accounts'));
    }

    public function update(Signature $signature, SignatureUpdateRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->signatureService->update($signature, $validated);

            return back()->with('success', 'Assinatura actualizada com sucesso!');
            
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Signature $signature)
    {
        try {
            $this->signatureService->delete($signature);

            return back()->with('success', 'Assinatura excluida com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function suspendSignature(Signature $signature)
    {
        try {
            $status = $signature->status ? 'suspensa' : 'activada';
            $this->signatureService->suspend($signature);

            return back()->with('success', "Assinatura {$status} com sucesso!");

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
