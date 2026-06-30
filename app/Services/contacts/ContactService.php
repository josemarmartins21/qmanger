<?php

namespace App\Services\contacts;

use App\Facades\enderecos\EnderecoFacade;
use App\Models\Account;
use App\Models\Contact;
use App\Services\contacts\contracts\ContactInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

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

    public function save($data = []): void
    {
        try {
            
           $endereco = EnderecoFacade::create($data);
           $account = Account::find($data['account_id']);
    
           if ($account === null) {
            throw new \Exception("Conta não encontrada");
           }
    
           $contact = Contact::create([
                'first_name' => $data['first_name'], 
                'last_name' => $data['last_name'],
                'email' => $data['email'], 
                'phone' => $data['phone'],
                'user_id' => Auth::user()->id,
                'endereco_id' => $endereco->id,
           ]);

            $contact->associateAccount($account);

       } catch (\Exception $e) {
            throw new \Exception("Erro: " . $e->getMessage());
       }
    }

}