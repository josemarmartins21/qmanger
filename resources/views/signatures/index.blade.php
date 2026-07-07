@use('Carbon\Carbon')
@use('App\Helpers\DateHelper')
@extends('layouts.main')

@section('title', 'QManager - Assinaturas')

@section('content')
<x-dashboard.alert />
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
                        <th>Expira Em</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                        @foreach ($signatures as $signature)
                            @php($remainingDays = Carbon::today()->diffInDays($signature->end_date))
                            <tr>
                                <td style="color: {{ DateHelper::remainingDays($remainingDays) }}">{{ $signature->id }}</td>
                                <td style="color: {{ DateHelper::remainingDays($remainingDays) }}">{{ $signature->account_name }}</td>
                                <td style="color: {{ DateHelper::remainingDays($remainingDays) }}">{{ $signature->number_account }}</td>
                                <td style="color: {{ DateHelper::remainingDays($remainingDays) }}">{{ $signature->plan_name }}</td>
                                <td style="color: {{ DateHelper::remainingDays($remainingDays) }}"> 
                                @if ($remainingDays > 0) 
                                        {{ $remainingDays }} 
    
                                        {{ $remainingDays == 1 ? 'dia para expirar' : 'dias para expirar' }} 
                                @elseif ($remainingDays == 0)
                                    Expiraou Hoje
                                @else 
                                    {{ 'Expirou há ' . abs($remainingDays) . ' dias'}} 
                                @endif
                                    </td>
                                </td>
                                <td style="color: {{ DateHelper::remainingDays($remainingDays) }}">{{ number_format($signature->price, 2, ',', '.') .'Kz' }}</td>
                                <td class="flex gap-2" >
                                    <x-dashboard.action-btn 
                                        href="{{ route('signatures.edit', ['signature' => $signature->id]) }}"
                                        type="a"
                                        class="bg-green-800"
                                    >
                                        Editar
                                    </x-dashboard.action-btn>
                                    <form 
                                        action="{{ route('signatures.destroy', ['signature' => $signature->id]) }}"
                                        method="POST"
                                    >
                                        @method('Delete')
                                        @csrf

                                        <x-dashboard.action-btn
                                            class="bg-red-600"
                                            onclick="return confirm('Tem a certeza que deseja exluir?')"
                                        >
                                            Excluir
                                        </x-dashboard.action-btn>
                                    </form>

                                    <form 
                                        action="{{ route('signatures.suspend', ['signature' => $signature->id]) }}"
                                        method="POST"
                                    >
                                        @method('Patch')
                                        @csrf

                                        @php($action = $signature->status ? 'Suspender' : 'Activar')
                                        <x-dashboard.action-btn
                                            @class([
                                                'bg-yellow-800' => $signature->status, 
                                                'bg-blue-600' => !$signature->status,
                                                'w-[90px] text-center',
                                            ])
                                            onclick="return confirm('Tem a certeza que deseja {{ $action }} esta assinatura?')"
                                        >
                                            {{ 
                                                $action
                                            }}
                                        </x-dashboard.action-btn>
                                    </form>
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
           <i class="fa-solid fa-plus"></i>
       </x-dashboard.float-btn> 
    </section>
@endsection  