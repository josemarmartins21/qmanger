<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper 
{
    public static function diffForHumans(string $date)
    {
        $date = Carbon::parse($date);

        return $date->diffForHumans();
    }

    public static function currentExtendedDate()
    {
        return Carbon::now()
        ->locale('pt_BR')
        ->translatedFormat('l, d \\d\\e F \\d\\e Y');
    }
    
}