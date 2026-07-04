@use('Carbon\Carbon')
@use('App\Helpers\DateHelper')
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
                        <th>Dias Restante</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                        @foreach ($signatures as $signature)
                            @php($remainingDays = $signature->start_date->diffforhumans($signature->end_date))
                            <tr>
                                <td>{{ $signature->id }}</td>
                                <td>{{ $signature->account_name }}</td>
                                <td>{{ $signature->number_account }}</td>
                                <td>{{ $signature->plan_name }}</td>
                                <td class="text-{{ DateHelper::remainingDays((int)$remainingDays) }}-900">
                                    {{ $remainingDays }}
                                </td>
                                <td>{{ number_format($signature->price - $signature->discount, 2, ',', '.') .'Kz' }}</td>
                                <td class="flex gap-2">
                                    <x-dashboard.action-btn 
                                        :rota="route('signatures.edit', ['signature' => $signature])"
                                        type="a"
                                        class="bg-green-800"
                                    >
                                        Editar
                                    </x-dashboard.action-btn>
                                    <x-dashboard.action-btn 
                                        :rota="route('signatures.destroy', ['signature' => $signature])"
                                        type="form"
                                        method="DELETE"
                                        class="bg-red-600"
                                    >
                                        Excluir
                                    </x-dashboard.action-btn>
                                </td>
                            </tr>
                            
                        @endforeach
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