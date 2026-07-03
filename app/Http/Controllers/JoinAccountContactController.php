<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Contact;
use App\Services\join_contact\JoinAccountContactService;
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

    public function join(Contact $contact)
    {
        
    }
}
