<?php

namespace App\Strategy\alert_mails;

use App\Mail\LastSignatureAlertCompany;
use App\Models\Signature;
use App\Strategy\alert_mails\contracts\AlertExpiredSignature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class LastAlertExpiredSignature implements AlertExpiredSignature
{
    private Collection $signature;

    public function __construct()
    {
        $this->signature = Signature::all();
    }
    
    public function send(): void
    {
        foreach ($this->signature as $signature) {
            if (Carbon::today()->diffInDays($signature->end_date, true) == 0) {
                Mail::to('deodato.dalton@qostel.co.ao')->send(new LastSignatureAlertCompany($this->signature));
                return;
            }
        }
    }
}