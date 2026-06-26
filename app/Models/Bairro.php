<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
