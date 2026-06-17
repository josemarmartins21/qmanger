@extends('layouts.main')


@section('title', 'Criar')


@section('content')
    <section id="create-container">
        <x-dashboard.content class="md:bg-white md:dark:bg-(--dark-fundo-card) md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Criar Novo Registro</x-slot:title>
                <x-slot:disclaimer>
                    onsectetur adipisicing elit. Cum nulla sed i
                </x-slot:disclaimer>
            </x-dashboard.title-form>
        
            <x-dashboard.form-container 
                method="GET" 
                action=""
            >
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="nome">
                        Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" name="nome" id="nome" placeholder="Nome *"></x-dashboard.form-input>
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="email">
                        Email
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" name="nome" id="email" placeholder="Email *"></x-form-input>
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="nome">
                        País
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" name="nome" id="nome" placeholder="Páis *"></x-form-input>
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="nome">
                        NIF
                    </x-dashboard.form-label>

                    <x-dashboard.input-select>
                        <x-dashboard.form-option>
                            Selecione Algo
                        </x-dashboard.form-option>
                        @for ($i=0;$i<5;$i++) 
                        <x-dashboard.form-option>
                            value
                        </x-dashboard.form-option>
                        @endfor
                    </x-dashboard.input-select>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
            <x-dashboard.form-btn>
                Cadastrar
            </x-dashboard.form-btn>
        </x-dashboard.content>
    </section>
@endsection    


