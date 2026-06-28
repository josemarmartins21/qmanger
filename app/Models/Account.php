<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}
