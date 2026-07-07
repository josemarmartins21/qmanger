@extends('layouts.main')

@section('title', 'QManager - Clientes')


@section('content')
<x-dashboard.alert />
    <section id="index-container">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Novo Cliente</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>

            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('contacts.store') }}"
            >

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="first_name">
                        Primeiro Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('first_name') }}" name="first_name" id="name" placeholder="Primeiro nome do cliente *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="last_name">
                        Último Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('last_name') }}" name="last_name" id="name" placeholder="Último nome do cliente *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="phone">
                        Telefone
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('phone') }}" name="phone" id="name" placeholder="Telefone do cliente *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="email">
                        Email
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="email" value="{{ old('email') }}" name="email" id="email" placeholder="Email do cliente"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="bairro_id">
                        Bairro/Municipio
                    </x-dashboard.form-label>
                    
                    <x-dashboard.input-select name="bairro_id">
                        <option value="" selected>Selecione um bairro *</option>
                        @foreach ($bairroMunicipios as $bairro)
                            <option 
                                value="{{ $bairro['id'] }}" 
                                {{ old('bairro_id') == $bairro['id'] ? 'selected' : '' }}
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

                    <x-dashboard.form-input type="text" value="{{ old('street') }}" name="street" id="street" placeholder="Rua"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('street')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="indicacoes">
                        Indicacoes
                    </x-dashboard.form-label>
                    
                    <x-dashboard.form-input-text 
                        name="indicacoes" id="indicacoes" 
                    >
                    {{ old('indicacoes') }}
                </x-dashboard.form-input-text>
                <x-input-error :messages="$errors->get('indicacoes')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="account">
                        Conta
                    </x-dashboard.form-label>
                    
                    <x-dashboard.input-select name="account_id">
                        <option value="" selected>Associe o contacto a uma conta</option>
                        @foreach ($contas as $conta)
                            <option 
                                value="{{ $conta['id'] }}" 
                                @disabled(! $conta['is_active'])
                                {{ old('account_id') == $conta['id'] ? 'selected' : '' }}
                            >
                                {{ $conta['name'] }}
                            </option>
                        @endforeach
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('account_id')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container class="justify-center">
                    <x-dashboard.form-btn>
                        Cadastrar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  