<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Contact;
use App\Services\join_contact\JoinAccountContactService;
use Exception;
use Illuminate\Http\Request;

class JoinAccountContactController extends Controller
{

    public function __construct(
        private JoinAccountContactService $joinAccountContact,
    )
    {
        
    }
    public function form(Account $account)
    {
        $contacts = Contact::select(
            'first_name', 
            'last_name', 
            'email', 
            'phone',
            'id',
        )
        ->orderBy('first_name')
        ->get();

        return view('join-contacts.join', compact('account', 'contacts'));
    }

    public function join(Request $request)
    {
        try {

            $validated = $request->validate([
                'contact_id' => 'required|integer|numeric|min:1',
                'account_id' => 'required|integer|numeric|min:1',
            ]);
    
            $account = Account::find($validated['account_id']);
            $contact = Contact::find($validated['contact_id']);
    
            $this->joinAccountContact->join($account, $contact);

            return redirect()->back()->with('success', 'Contacto associado com sucess!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
