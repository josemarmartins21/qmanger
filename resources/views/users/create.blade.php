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
                action="{{ route('register') }}"
            >

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="name">
                        Nome
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('name') }}" name="name" id="name" placeholder="name *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="email">
                        Email
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ old('email') }}" name="email" id="email" placeholder="Email *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="password">
                        Senha
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="password" value="{{ old('password') }}" name="password" id="password" placeholder="Senha *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="password_confirmation">
                        Confirmar Senha
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Senha *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </x-dashboard.input-container>
                <x-dashboard.input-container>
                    <x-dashboard.form-btn>
                        Cadastrar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
                <x-dashboard.checkbox-container>
                    <x-slot:title>
                        Acessos
                    </x-slot:title>

                    <x-slot:check-box>
                        @foreach ($permissions as $permission) 
                            @can ('super-admin') 
                                <div>
                                     <x-dashboard.form-label for="{{ $permission->name }}">
                                         {{ $permission->name }}
                                     </x-dashboard.form-label>
                                     <x-dashboard.form-checkbox name="roles[]" value="{{ $permission->name }}" target="{{ $permission->name }}" />
                                </div>
                            @elsecan ('admin') 
                                @if ($permission->name === 'default') 
                                    <div>
                                         <x-dashboard.form-label for="{{ $permission->name }}">
                                             {{ $permission->name }}
                                         </x-dashboard.form-label>
                                         <x-dashboard.form-checkbox name="roles[]" value="{{ $permission->name }}"  :isCheck="true" target="{{ $permission->name }}" />
                                    </div>
                                @endif
                            @endcan
                        @endforeach
                    </x-slot:check-box>
                      
                </x-dashboard.checkbox-container>
                
            </x-dashboard.form-container>

        </x-dashboard.content>
    </section>
@endsection    


