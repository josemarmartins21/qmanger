<?php

namespace App\Console\Commands;

use App\Factories\AlertEmailFactory;
use App\Models\Contact;
use App\Models\Signature;
use Carbon\Carbon;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature as AttributesSignature;
use Illuminate\Console\Command;

#[AttributesSignature('app:signature-command')]
#[Description('Command description')]
class SignatureCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Signature::all() as $signature) {
            if (Carbon::today()->diffInDays($signature->end_date) <= 5) {
                AlertEmailFactory::create('company')->send();
            }
        }
        
    }
}
