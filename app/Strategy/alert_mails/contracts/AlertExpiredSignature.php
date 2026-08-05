<?php

namespace App\Strategy\alert_mails\contracts;



interface AlertExpiredSignature
{
    /**
     * @return void
     */
    public function send(): void;
}