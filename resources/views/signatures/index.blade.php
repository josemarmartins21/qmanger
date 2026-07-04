@use('App\Models\User')
@extends('layouts.main')

@section('title', 'QManager - Assinaturas')

@section('content')
    <section id="index-container">
       <x-dashboard.content>
            <x-dashboard.title-section>
                Assinaturas
            </x-dashboard.title-section> 

    
            <x-dashboard.main-table class="md:mb-4">
                <x-dashboard.table>
                    <x-slot:thead>
                        <th>ID</th>
                        <th>Conta</th>
                        <th>Nª da Conta</th>
                        <th>Plano</th>
                        <th>Data de Inicio</th>
                        <th>Data de Termino</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                     
                       
                    </x-slot:body>
                </x-dashboard.table>

            </x-dashboard.main-table>
            {{ $signatures->links() }}
       </x-dashboard.content>
       <x-dashboard.float-btn 
           bottom="2"
           :rota="route('signatures.create')"
           class="bg-blue-600"
           type="a"
       >
           +
       </x-dashboard.float-btn> 
    </section>
@endsection  