<?php

namespace App\Http\Controllers;

use App\Facades\enderecos\EnderecoFacade;
use App\Http\Requests\contacts\ContactRequest;
use App\Http\Requests\contacts\ContactUpdateRequest;
use App\Models\Account;
use App\Models\Contact;
use App\Services\contacts\contracts\ContactInterface;
use Exception;

class ContactController extends Controller
{
    private $bairroMunicipio = [];

    public function __construct(
        private ContactInterface $contact
    )
    {
        $this->bairroMunicipio = EnderecoFacade::bairroMunicipios();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->contact->getAll();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bairroMunicipios = $this->bairroMunicipio;
        
        $contas = Account::select('name', 'id', 'is_active')
        ->orderBy('name')
        ->get()->toArray();

        return view('contacts.create', compact('bairroMunicipios', 'contas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        
        try {
            $validated = $request->validated();
    
            $this->contact->save($validated);

            return redirect()->route('contacts.index')
            ->with('success', 'Contacto criado com sucesso!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()
            ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $bairroMunicipios = $this->bairroMunicipio;

        return view('contacts.edit', compact('contact', 'bairroMunicipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ContactUpdateRequest $request, 
        Contact $contact
    )
    {
        
        try {
            
            $this->contact->update($contact, $request->validated());

            return redirect()->back()->with('success', 'Contacto actualizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $this->contact->delete($contact);
            return redirect()->back()->with('success', 'Contacto elimino com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
