@extends('layouts.main')

@section('title', 'QManager - Clientes')


@section('content')
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
                action="{{ route('plans.store') }}"
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
                    <x-dashboard.form-label for="last_name">
                        Último Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('last_name') }}" name="last_name" id="name" placeholder="Último nome do cliente *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="price">
                        Preço
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="number" value="{{ old('price') }}" name="price" id="price" placeholder="Preço do plano *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="velocity_download">
                        Velocidade de download
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="number" value="{{ old('velocity_download') }}" name="velocity_download" id="velocity_download" placeholder="Velocidade em mbps *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('velocity_download')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="instalation_tax">
                        Taxa de instalação
                    </x-dashboard.form-label>

                    <x-dashboard.form-input 
                        type="number" 
                        value="{{ old('instalation_tax') }}" 
                        name="instalation_tax" id="instalation_tax" 
                        placeholder="Taxa de instalação *"
                    >
                    </x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('instalation_tax')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="description">
                        Descrição
                    </x-dashboard.form-label>

                    <x-dashboard.form-input-text 
                        type="text" 
                        name="description" id="description" 
                    >
                        {{ old('description') }}
                    </x-dashboard.form-input-text>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
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