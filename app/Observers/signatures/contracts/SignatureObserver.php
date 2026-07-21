<?php 

namespace App\Observers\signatures\contracts;


interface SignatureObserver
{
    public function updated(): void;
}