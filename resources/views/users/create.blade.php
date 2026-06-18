@extends('layouts.main')


@section('title', 'Usuários')


@section('content')
    <section id="users-create">
                <x-dashboard.content class="md:bg-white dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Novo Usuário</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>
        
            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('users.store') }}"
            >

            @csrf


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
                        Senha
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" name="nome" id="nome" placeholder="Senha *"></x-form-input>
                </x-dashboard.input-container>
            </x-dashboard.form-container>

            <x-dashboard.checkbox-container>
                <x-slot:title>
                    Acessos
                </x-slot:title>

                <x-slot:check-box>
                    @for ($i=0;$i<5;$i++) 
                        <div>
                            <x-dashboard.form-label for="admin">
                                Admin
                            </x-dashboard.form-label>
                            <x-dashboard.form-checkbox value="admin" target="admin" />
                        </div>
                    @endfor
                </x-slot:check-box>
            </x-dashboard.checkbox-container>
            <x-dashboard.form-btn>
                Cadastrar
            </x-dashboard.form-btn>
        </x-dashboard.content>
    </section>
@endsection    


