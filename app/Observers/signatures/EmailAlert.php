<?php

use App\Observers\signatures\contracts\SignatureObserver;

class EmailAlert implements SignatureObserver
{
    public function updated(): void
    {
        dd('x');
    }
}