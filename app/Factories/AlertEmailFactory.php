<?php

namespace App\Factories;

use App\Services\alert_emails\CompanyAlertEmail;
use App\Services\alert_emails\contracts\AlertEmail;

class AlertEmailFactory
{
    public static function create(string $type): AlertEmail
    {
        return match ($type) {
            'company' => new CompanyAlertEmail(),
        };
    }
}