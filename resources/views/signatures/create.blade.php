@extends('layouts.main')

@section('title', 'QManager - Assinaturas')


@section('content')
<x-dashboard.alert />
    <section id="index-container">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
            <x-dashboard.title-form class="pb-3">
                <x-slot:title>Nova Assinatura</x-slot:title>
                <x-slot:disclaimer>
                    Os campos obrigatórios estão marcados com *
                </x-slot:disclaimer>
            </x-dashboard.title-form>

            <x-dashboard.form-container 
                method="POST" 
                action="{{ route('signatures.store') }}"
            >

                <x-dashboard.input-container>
                    <x-dashboard.form-label for="account_id">
                        Conta *
                    </x-dashboard.form-label>

                    <x-dashboard.input-select name="account_id" id="account_id">
                        <option value="" selected>Selecione a conta</option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}" 
                                @selected(old('account_id') == $account->id)
                                @disabled(! $account->is_active)
                            >
                                {{ $account->number_account }}
                            </option>
                        @endforeach
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('account_id')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="plan_id">
                        Plano *
                    </x-dashboard.form-label>

                    <x-dashboard.input-select name="plan_id" id="plan_id">
                        <option value="" selected>Selecione o plano</option>
                        @foreach ($plans as $plan)
                            <option 
                                @selected(old('plan_id') == $plan->id)
                                value="{{ $plan->id }}"
                            >
                                {{ $plan->name . ' - ' . number_format($plan->price, 2, ',', '.') . 'Kz' }}
                            </option>
                        @endforeach
                    </x-dashboard.input-select>

                    <x-input-error :messages="$errors->get('plan_id')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="discount">
                        Desconto
                    </x-dashboard.form-label>

                    <x-dashboard.form-input 
                        type="number"
                        name="discount" 
                        id="discount"
                        min="0"
                        value="{{ old('discount') }}"
                    ></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                </x-dashboard.input-container>
                
                <x-dashboard.input-container>
                    <x-dashboard.form-label for="start_date">
                        Data de Início
                    </x-dashboard.form-label>

                    <x-dashboard.form-input 
                        type="date"
                        name="start_date" 
                        id="start_date"
                        value="{{ old('start_date', date('Y-m-d')) }}"
                    ></x-dashboard.form-input>

                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </x-dashboard.input-container>

                <x-dashboard.input-container class="justify-end">
                    <x-dashboard.form-btn>
                        Cadastrar
                    </x-dashboard.form-btn>
                </x-dashboard.input-container>
            </x-dashboard.form-container>
       </x-dashboard.content>
    </section>
@endsection  