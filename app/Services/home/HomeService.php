<?php

namespace App\Services\home;

use App\Models\Signature;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeService
{
    public function totActiveSignatures(): int
    {
        return Signature::where('status', true)->count();
    }

    public function monthRecipe(): float
    {
        return Signature::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->sum('price');
    }

    public function municipioComMaiorNumeroDeContas(): object | array
    {
        $municipioComMaiorNumeroDeContas = DB::select("SELECT COUNT(bairros.municipio_id) AS total_conta, 
            bairros.municipio_id AS id 
            FROM accounts JOIN enderecos ON accounts.endereco_id = enderecos.id
            JOIN bairros 
            ON bairros.id = enderecos.bairro_id
            GROUP BY bairros.municipio_id, bairros.id
            ORDER BY COUNT(bairros.municipio_id) DESC 
            LIMIT ?;
        ", [1]);

        if (count($municipioComMaiorNumeroDeContas) === 0) {
            return [];
        }

        return $municipioComMaiorNumeroDeContas[0];
    }

    public function totSignaturesToActive(): int
    {
        return Signature::where('start_date', '<=', date('Y-m-d'))
        ->where('status', false)->count();
    }
}