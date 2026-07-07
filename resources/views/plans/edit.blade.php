@extends('layouts.main')

@section('title', 'QManager - Planos')


@section('content')
<x-dashboard.alert />
    <section id="index-container">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Editar Plano {{ $plan->name }}</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>

            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('plans.update', ['plan' => $plan->id]) }}"
            >

                @method('PUT')
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="name">
                        Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('name', $plan->name) }}" name="name" id="name" placeholder="Nome *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="price">
                        Preço
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="number" value="{{ old('price', abs($plan->price)) }}" name="price" id="price" placeholder="Preço do plano *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="velocity_download">
                        Velocidade de download
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="number" value="{{ old('velocity_download', $plan->velocity_download) }}" name="velocity_download" id="velocity_download" placeholder="Velocidade em mbps *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('velocity_download')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="description">
                        Descrição
                    </x-dashboard.form-label>

                    <x-dashboard.form-input-text 
                        type="text" 
                        name="description" id="description" 
                    >
                        {{ old('description', $plan->description) }}
                    </x-dashboard.form-input-text>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-btn>
                        Atualizar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  