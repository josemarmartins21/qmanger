<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }
}
