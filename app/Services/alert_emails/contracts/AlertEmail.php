<?php

namespace App\Services\alert_emails\contracts;




interface AlertEmail
{
    public function send(): void;
}