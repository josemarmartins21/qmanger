<?php

namespace App\Strategy\alert_mails;

use App\Strategy\alert_mails\contracts\AlertExpiredSignature;

class ExpiredSignatureChecker
{

    /**
     * @return void
     */
    public static function check(AlertExpiredSignature $alertExpiredSignature): void
    {
        $alertExpiredSignature->send();
    }
}