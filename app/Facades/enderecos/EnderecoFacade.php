<?php

namespace App\Facades\enderecos;

use App\Models\Bairro;
use App\Models\Endereco;
use Exception;
use Throwable;

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
    
    public static function update(Endereco $endereco, $data = [])
    {
        try {
            return $endereco->updateOrFail([
                'indicacoes' => $data['indicacoes'],
                'bairro_id' => $data['bairro_id'],
                'street' => $data['street'],
            ]);

        } catch (Throwable) {
            throw new Exception("Algo deu errado tente novamente.");
        }
    }
}