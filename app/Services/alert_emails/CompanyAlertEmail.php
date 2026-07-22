<?php

namespace App\Services\alert_emails;

use App\Mail\SignatureAlertCompany;
use App\Models\Signature;
use App\Services\alert_emails\contracts\AlertEmail;
use Illuminate\Support\Facades\Mail;

class CompanyAlertEmail implements AlertEmail
{
    public function send(): void
    {
        Mail::to('deodato.dalton@qostel.co.ao')->send(new SignatureAlertCompany(Signature::all()));
    }
}