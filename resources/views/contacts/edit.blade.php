@extends('layouts.main')

@section('title', 'QManager - Clientes')
{{-- @dd($contact->endereco) --}}

@section('content')
    <section id="index-container">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Editar Cliente {{ $contact->first_name . ' ' . $contact->last_name }}</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>

            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('contacts.update', ['contact' => $contact->id]) }}"
            >

                @method('Put')

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="first_name">
                        Primeiro Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('first_name', $contact->first_name) }}" name="first_name" id="first_name" placeholder="Primeiro nome do cliente *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="last_name">
                        Último Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('last_name', $contact->last_name) }}" name="last_name" id="last_name" placeholder="Último nome do cliente *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="phone">
                        Telefone
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('phone', $contact->phone) }}" name="phone" id="phone" placeholder="Telefone do cliente *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="email">
                        Email
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="email" value="{{ old('email', $contact->email) }}" name="email" id="email" placeholder="Email do cliente"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="bairro_id">
                        Bairro/Municipio
                    </x-dashboard.form-label>
                    
                    <x-dashboard.input-select name="bairro_id" id="bairro_id">
                        @foreach ($bairroMunicipios as $bairro)
                            <option 
                                value="{{ $bairro['id'] }}" 
                                {{ old(
                                        'bairro_id', $contact->endereco->bairro_id
                                    ) == $bairro['id'] ? 'selected' : ''    
                                }}
                            > 
                                {{ $bairro['municipio'] . ' - ' .  $bairro['bairro'] }} 
                            </option>
                        @endforeach
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('bairro_id')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="street">
                        Rua
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('street', $contact->endereco->street) }}" name="street" id="street" placeholder="Rua"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('street')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="indicacoes">
                        Indicacoes
                    </x-dashboard.form-label>
                    
                    <x-dashboard.form-input-text 
                        name="indicacoes" 
                        id="indicacoes" 
                    >
                    {{ old('indicacoes', $contact->endereco->indicacoes) }}
                </x-dashboard.form-input-text>
                <x-input-error :messages="$errors->get('indicacoes')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container class="justify-center">
                    <x-dashboard.form-btn>
                        Atualizar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  