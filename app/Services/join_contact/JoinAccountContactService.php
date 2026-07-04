<?php

namespace App\Services\join_contact;

use App\Models\Account;
use App\Models\Contact;
use InvalidArgumentException;

class JoinAccountContactService
{
    public function join(Account $account, Contact $contact): void
    {
        try {
            $contact->associateAccount($account);
        } catch (InvalidArgumentException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function unJoin(Account $account, Contact $contact): void
    {
        try {
            $contact->disassociateAccount($account);
        } catch (InvalidArgumentException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}