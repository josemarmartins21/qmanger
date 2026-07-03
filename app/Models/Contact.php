<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

#[Fillable([
    'first_name', 
    'email', 
    'last_name',
    'endereco_id',
    'phone',
    'user_id',
])]
class Contact extends Model
{
    use HasFactory;

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }

    public function associateAccount(Account $account): void
    {
        if (! $this->accounts()->where('accounts.id', $account->id)->exists()) {
            $this->accounts()->attach($account);
            return;
        }
        throw new InvalidArgumentException("Contacto já associado a conta: " . $account->name);
    }

 /*    public function hasAccount()
    {
        $this->accounts()->where('id', );
    } */
}
