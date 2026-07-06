<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'account_id',
    'plan_id',
    'user_id', 
    'price',
    'start_date', 
    'end_date',
    'discount',
    'status',
    'plan_name',
])]
class Signature extends Model
{
    /** @use HasFactory<\Database\Factories\SignatureFactory> */
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
