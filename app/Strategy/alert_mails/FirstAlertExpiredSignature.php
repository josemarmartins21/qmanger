<?php

namespace App\Strategy\alert_mails;

use App\Mail\FirstSignatureAlertCompany;
use App\Models\Signature;
use App\Strategy\alert_mails\contracts\AlertExpiredSignature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class FirstAlertExpiredSignature implements AlertExpiredSignature
{
    private Collection $signature;

    public function __construct()
    {
        $this->signature = Signature::all();
    }

    public function send(): void
    {
        
        foreach ($this->signature as $signature) {
            if (Carbon::today()->diffInDays($signature->end_date, true) == 5 AND $signature->status) {
                Mail::to('deodato@email,com')->send(new FirstSignatureAlertCompany($this->signature));
                return;
            }
            }
        }
}