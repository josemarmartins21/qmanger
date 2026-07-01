@extends('layouts.main')

@section('title', 'QManager - Contas')


@section('content')
    <section id="index-container">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Nova Conta</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>

            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('accounts.store') }}"
            >

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="name">
                        Nome da Conta
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('name') }}" name="name" id="name" placeholder="Nome da Conta *"></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="type">
                        Tipo de conta
                    </x-dashboard.form-label>

                    <x-dashboard.input-select name="type">
                        <option value="" selected>Selecione o tipo de conta</option>
                        <option 
                            value="residêncial" 
                            @selected(old('type') == 'residêncial' )
                        >
                            Residêncial
                        </option>
                        <option 
                            value="empresarial" 
                            @selected(old('type') == 'empresarial' )
                        >
                            Empresarial
                    </option>
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="is_active">
                        Estado da Conta
                    </x-dashboard.form-label>

                    <x-dashboard.input-select name="is_active">
                        <option value="1" @selected(old('is_active') == '1' )>
                            Activada
                        </option>
                        <option value="0" @selected(old('is_active') == '0' )>
                            Desactivada
                        </option>
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
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

                    <x-dashboard.form-input type="text" value="{{ old('street') }}" name="street" id="street" placeholder="Rua *"></x-dashboard.form-input>

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
                    <x-dashboard.form-btn>
                        Cadastrar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  