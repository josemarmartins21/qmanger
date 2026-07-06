<?php

namespace App\Services\contacts;

use App\Facades\enderecos\EnderecoFacade;
use App\Models\Account;
use App\Models\Contact;
use App\Services\contacts\contracts\ContactInterface;
use App\Services\join_contact\JoinAccountContactService;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use LogicException;
use Throwable;

class ContactService implements ContactInterface
{
 
    public function __construct(
        private JoinAccountContactService $joinAccount,
    )
    {
        
    }
    public function getAll(): LengthAwarePaginator
    {

        $attributes = [
            'bairros.name AS bairro',
            'contacts.first_name',
            'contacts.last_name',
            'municipios.name AS municipio',
            'contacts.email',
            'contacts.phone',
            'contacts.user_id',
            'contacts.id as contact_id',
            'municipios.id',
            'enderecos.indicacoes',
            'enderecos.street',
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

            $this->joinAccount->join($account, $contact);

       } catch (\Exception $e) {
            throw new \Exception("Erro: " . $e->getMessage());
       }
    }

    public function update(Contact $contact, $data = []): void
    {
        try {

            $this->isAvaliable('email', $data['email'], $contact);
            $this->isAvaliable('phone', $data['phone'], $contact);
            
            $contact->update($data);
            EnderecoFacade::update($contact->endereco, $data);

        } catch (\InvalidArgumentException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function isAvaliable(string $column, $attribute, Contact $contact): void
    {
        $unAvaliable = Contact::where($column, $attribute)
        ->where('id', '<>', $contact->id)
        ->exists();

        $column = $column == 'phone' ? 'telefone' : $column;

        if ($unAvaliable) {
            throw new InvalidArgumentException("O " . $column . " " . $attribute . " já está em uso.");
        }
    }

    public function delete(Contact $contact): void
    {
        try {
           // $endereco = $contact->endereco;
            
            $contact->delete();

           // $endereco->delete();

        } catch (LogicException) {
            throw new \Exception("Erro ao elimiar o contacto. Tente novamente!");
        }
    }

}