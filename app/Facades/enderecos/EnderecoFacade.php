<?php

namespace App\Facades\enderecos;

use App\Models\Bairro;
use App\Models\Endereco;

class EnderecoFacade
{
    public static function bairroMunicipios()
    {
        return Bairro::select(
            'bairros.name AS bairro', 
            'municipios.name AS municipio',
            'municipios.name AS municipio',
            'bairros.id',
        )->join('municipios', 'municipios.id', '=', 'bairros.municipio_id')
        ->orderBy('municipios.name')
        ->get()->toArray();
    }

    public static function create($data = [])
    {
        return Endereco::create([
            'indicacoes' => $data['indicacoes'],
            'bairro_id' => $data['bairro_id'],
            'street' => $data['street'],
        ]);
    }
}