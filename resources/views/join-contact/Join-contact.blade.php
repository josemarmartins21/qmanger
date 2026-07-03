@extends('layouts.main')

@section('title', 'QManager - Associar Conta a um Contacto')


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
                    <x-dashboard.form-btn>
                        Associar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  
