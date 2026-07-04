@extends('layouts.main')
@use('Carbon\Carbon')
@use('App\Models\User')
@use('App\Models\Endereco')
@use('App\Models\Bairro')
@use('App\Models\Municipio')

@php
    $endereco = Endereco::find($account->endereco_id);
    $bairro = Bairro::find($endereco->bairro_id);
    $municipio = Municipio::find($bairro->municipio_id);
@endphp

@section('title', 'QManager - Contas')

@section('content')
    <section id="index-container" class="mt-5">
       <x-dashboard.content class="md:bg-white md:dark:bg-[var(--dark-fundo-card)] md:p-5">
        <x-dashboard.title-section>
            {{ $account->name }}
        </x-dashboard.title-section>
        <ul class="text-zinc-200 text-[17px]">
            <li>Nª {{ $account->number_account }}</li>
            <li>Tipo de Conta: {{ ucwords($account->type) }}</li>
            <li>Activa desde {{ Carbon::parse($account->activation_date)->format('d/m/Y') }}</li>
            <li>Criada por {{ User::find($account->user_id)->name }} </li>
        </ul>
        <div @class(['bg-green-800' => $account->is_active, 'w-[120px] animate-pulse text-center p-3  rounded-xl mt-3','bg-red-800' => !$account->is_active,'font-bold' => true])>
            {{ $account->is_active ? 'Activa' : 'Desactivada' }}
        </div>
        <hr class="my-6">
        <div>
            <h2 class="text-3xl font-semibold pb-2">Endereço</h2>
            <p class="text-zinc-200 text-[17px]">Município {{ $municipio->name }}</p>
            <p class="text-zinc-200 text-[17px]">Bairro {{ $bairro->name }}</p>
            <p class="text-zinc-200 text-[17px]">Rua {{ $endereco->street }}</p>
            <x-dashboard.action-btn 
                id="ver-indicacoes" 
                class="ver-mais-accounts bg-blue-600 mt-3"
                onclick="showModalIndicacoes()"
            >
                Ver Indicações
            </x-dashboard.action-btn> 
        </div>
       </x-dashboard.content>
       <x-dashboard.modal>
            <div class="p-6 bg-zinc-900 text-zinc-100 rounded-md">
                <header class="mb-4 border-b border-zinc-800 pb-3">
                    <h2 id="modal-title" class="text-2xl font-semibold">Indicações</h2>
                </header>

                <div class="space-y-3">
                    <div class="mt-2 text-zinc-300">
                        <p id="modal-indicacoes" class="text-sm leading-relaxed">{{ $endereco->indicacoes }}</p>
                    </div>
                </div>

                <footer class="mt-5 flex justify-end">
                    <button type="button" class="px-4 py-2 bg-red-700 hover:opacity-100 md:opacity-80 text-zinc-100 rounded" id="close-modal-btn">
                        Fechar
                    </button>
                </footer>
            </div>
       </x-dashboard.modal>
       <x-dashboard.modal>
            <div class="p-6 bg-zinc-900 text-zinc-100 rounded-md">
                <header class="mb-4 border-b border-zinc-800 pb-3">
                    <h2 id="modal-title" class="text-2xl font-semibold">Indicações</h2>
                </header>   

                <div class="space-y-3">
                    <div class="mt-2 text-zinc-300">
                        <p id="modal-indicacoes" class="text-sm leading-relaxed">{{ $endereco->indicacoes }}</p>
                    </div>
                </div>

                <footer class="mt-5 flex justify-end">
                    <button type="button" class="px-4 py-2 bg-red-700 hover:opacity-100 md:opacity-80 text-zinc-100 rounded" id="close-modal-btn">
                        Fechar
                    </button>
                </footer>
            </div>
       </x-dashboard.modal>

       <x-dashboard.modal-table>
            <div class="p-6 bg-zinc-900 text-zinc-100 rounded-md">
                <header class="mb-4 border-b border-zinc-800 pb-3">
                    <h2 id="modal-title" class="text-2xl font-semibold">Contactos</h2>
                </header>   

                <div class="space-y-3">
                <x-dashboard.main-table class="md:mb-4 overflow-y-auto h-52">
                <x-dashboard.table>
                    <x-slot:thead>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                        @foreach ($account->contacts as $contact) 
                             <tr>
                                 <td>
                                    {{ $contact->first_name . ' ' . $contact->last_name  }}
                                </td>
                                 <td>{{ $contact->phone }} </td>
                                 <td>{{ $contact->email }} </td>
                                 <td>
                                    <form action="{{ route('unJoin') }}" method="POST">
                                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                        <input type="hidden" name="account_id" value="{{ $account->id }}">

                                        <x-dashboard.action-btn
                                                class="bg-yellow-700"
                                                onclick="return confirm('Tem certeza que deseja desassociar?')"
                                            >
                                                Desassociar
                                        </x-dashboard.card-btn>
                                    </form>
                                </td>
                             </tr>
                        @endforeach
                    </x-slot:body>
                </x-dashboard.table>

            </x-dashboard.main-table>
                </div>

                <footer class="mt-5 flex justify-between">
                    <a 
                        class="px-4 py-2 bg-blue-600 hover:opacity-100 md:opacity-80 text-zinc-100 rounded cursor-pointer"
                        href="{{ route('join.contact', ['account' => $account->id]) }}"
                    >
                        Adicionar Contacto
                    </a>

                    <button type="button" class="px-4 py-2 bg-red-700 hover:opacity-100 md:opacity-80 text-zinc-100 rounded" id="close-modal-btn-table">
                        Fechar
                    </button>
                </footer>
            </div>
       </x-dashboard.modal-table>
       <x-dashboard.float-btn 
            class="bg-blue-600"
        >
            C
        </x-dashboard.float-btn>
    </section>
@endsection  