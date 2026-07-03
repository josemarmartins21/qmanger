<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class JoinAccountContactController extends Controller
{
    public function join(Account $account)
    {
        dd($account);
    }
}
