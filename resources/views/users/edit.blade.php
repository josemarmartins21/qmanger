@extends('layouts.main')


@section('title', 'Usuários')


@section('content')
    <section id="users-create">
                <x-dashboard.content class="md:bg-white dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Editar Usuário {{ $user->name }}</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>
        
            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('users.update', ['user' => $user->id]) }}"
            >

                @method('PUT')

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="name">
                        name
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ $user->name }}" name="name" id="name" placeholder="name *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="email">
                        Email
                    </x-dashboard.form-label>

                    <x-dashboard.form-input type="text" value="{{ $user->email }}" name="email" id="email" placeholder="Email *"></x-dashboard.form-input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </x-dashboard.input-container>
                
             @if (Auth::user()->id !== $user->id)  
                   <x-dashboard.checkbox-container>
                       <x-slot:title>
                           Acessos
                       </x-slot:title>
   
                       <x-slot:check-box>
                           @foreach ($permissions as $permission) 
                               <div>
                                    <x-dashboard.form-label for="{{ $permission->name }}">
                                        {{ $permission->name }}
                                    </x-dashboard.form-label>
   
                                    @php
                                        $wasChecked = false;
   
                                        foreach ($userPermissions as $userpermission) {
                                           if ($userpermission->name === $permission->name) {
                                               $wasChecked = true;
                                           }
                                        }
   
                                    @endphp
                                    
                                    <x-dashboard.form-checkbox name="roles[]" value="{{ $permission->name }}" target="{{ $permission->name }}" :isCheck="$wasChecked" />
                                   </div>
                           @endforeach
                       </x-slot:check-box>
                         
                   </x-dashboard.checkbox-container>
             @endif
                
                <x-dashboard.input-container>
                    <x-dashboard.form-btn>
                        Cadastrar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
                
            </x-dashboard.form-container>

        </x-dashboard.content>
    </section>
@endsection    


