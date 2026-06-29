<?php

namespace App\Services\contacts;

use App\Models\Contact;
use App\Services\contacts\contracts\ContactInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactService implements ContactInterface
{
 
    public function getAll(): LengthAwarePaginator
    {

        $attributes = [
            'bairros.name AS bairro',
            'contacts.first_name',
            'contacts.last_name',
            'municipios.name AS municipio',
            'contacts.email',
            'contacts.phone',
            'contacts.id',
            'municipios.id',
        ];

        $contacts = Contact::select($attributes)
        ->join('enderecos', 'enderecos.id', '=', 'contacts.endereco_id')
        ->join('bairros', 'bairros.id', '=', 'enderecos.bairro_id')
        ->join('municipios', 'municipios.id', '=', 'bairros.municipio_id')
        ->orderByDesc('contacts.created_at')
        ->paginate(6);

        return $contacts;
    }

}