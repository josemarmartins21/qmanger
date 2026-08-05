<?php

namespace App\Services\alert_emails;

use App\Services\alert_emails\contracts\AlertEmail;
use App\Strategy\alert_mails\ExpiredSignatureChecker;
use App\Strategy\alert_mails\FirstAlertExpiredSignature;
use App\Strategy\alert_mails\LastAlertExpiredSignature;

class CompanyAlertEmail implements AlertEmail
{
    public function send(): void
    {
        ExpiredSignatureChecker::check(new FirstAlertExpiredSignature());
        ExpiredSignatureChecker::check(new LastAlertExpiredSignature());
    }

}