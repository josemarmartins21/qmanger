<?php

namespace App\Http\Controllers\app;



use App\Http\Controllers\Controller;
use App\Http\Requests\SignatureRequest;
use App\Models\Account;
use App\Models\Plan;
use App\Services\signatures\contracts\SignatureInterface;

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

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
