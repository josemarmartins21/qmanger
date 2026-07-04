@extends('layouts.main')

@section('title', 'QManager - Associar Conta a um Contacto')

@php($isAssociate = false)
@section('content')
    <section id="index-container">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Adicionar Contacto a Conta {{ $account->name }}</x-slot:title>
                <x-slot:disclaimer>
                   
                </x-slot:disclaimer>
            </x-dashboard.title-form>

            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('join') }}"
            >  
            <input type="hidden" name="account_id" value="{{ $account->id }}">

            <x-dashboard.input-container>
                    <x-dashboard.form-label for="contact_id">
                        Contacto
                    </x-dashboard.form-label>

                    <x-dashboard.input-select name="contact_id">

                        <option value="" selected>Selecione o Contacto</option>
                            @foreach ($contacts as $contact)
                                @foreach ($account->contacts as $c)
                                    @if ($contact->id == $c->id)
                                        @php($isAssociate = true)
                                    @endif
                                @endforeach

                            <option value="{{ $contact->id }}" 
                                @disabled($isAssociate)
                            > 
                                {{ $contact->first_name . ' ' . $contact->last_name }} 
                                - {{ $contact->phone }} 
                                - {{ $contact->email }} 
                            </option>

                            @php($isAssociate = false)
                        @endforeach
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('contact_id')" class="mt-2" />
                </x-dashboard.input-container>



                <x-dashboard.input-container class="justify-end">
                    <x-dashboard.form-btn>
                        Associar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  
