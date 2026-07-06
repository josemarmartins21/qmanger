@use('App\Models\Municipio')
@extends('layouts.main')    
@section('title', 'Dashboard')

@section('content')
    <section id="principal">
        <x-dashboard.content>
            <x-dashboard.overview>
            <x-slot:title>Resumo Rápido</x-slot:title>

                <x-dashboard.cards-overview>    
                    <x-dashboard.card-overview>
                        <span>Total de Assinaturas</span>
                        <h3 class="text-3xl">{{ $queries['total_assinaturas_activa'] }}</h3>
                        <p>Total de assinaturas activa</p>
                    </x-dashboard.card-overview>
                    
                    <x-dashboard.card-overview>
                        <span>Receita Total</span>
                        <h3 class="text-3xl">{{ number_format($queries['receita_do_mes'], 2, ',', '.') }}Kz</h3>
                        <p>Receita total do mês</p>
                    </x-dashboard.card-overview>
                    
                    <x-dashboard.card-overview>
                        <span>Município Mais Activo</span>
                        <h3 class="text-3xl">
                            {{ Str::limit(
                                    Municipio::find($queries['municipio_com_mais_clientes']
                                    ->id, 
                                    ['name'])?->name, 
                                    12,
                                    '...'
                                ) 
                            }}
                        </h3>
                        <p>
                            Total de clientes 
                            {{ 
                                $queries['municipio_com_mais_clientes'] === null 
                                ? '' : $queries['municipio_com_mais_clientes']->total_conta   
                            }}
                        </p>
                    </x-dashboard.card-overview>
                    
                    <x-dashboard.card-overview>
                        <span>Assinaturas Por Activar</span>
                        <h3 class="text-3xl">150</h3>
                        <p>Não perca nada activando as assinaturas</p>
                    </x-dashboard.card-overview>
                </x-dashboard.cards-overview>
            </x-dashboard.overview>
        </x-dashboard.content>

        <x-dashboard.fast-checkout class="md:grid">
            <x-dashboard.main-table
            >
                <x-dashboard.table>
                    <x-slot:thead>
                        <th>col 1</th>
                        <th>col 1</th>
                        <th>col 1</th>
                        <th>col 1</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                       @for ($i=0;$i < 5;$i++) 
                         <tr>
                             <td>lorem {{ $i+1  }} </td>
                             <td>lorem {{ $i+1  }} </td>
                             <td>lorem {{ $i +1}} </td>
                             <td>
                                 <x-dashboard.action-btn class="bg-green-800 mr-2.5">
                                     Edit
                                 </x-dashboard.action-btn>
                                 <x-dashboard.action-btn class="bg-red-800 mr-2.5">
                                     Delete
                                 </x-dashboard.action-btn>
                                 <x-dashboard.action-btn class="bg-blue-600">
                                     Ver Mais
                                 </x-dashboard.action-btn>
                             </td>
                         </tr>
                       @endfor
                    </x-slot:body>
                </x-dashboard.table>
            </x-dashboard.main-table>

            <x-dashboard.raking 
                description="Top 3 Planos mais assinado"
                title="Planos em alta"
                :items="$queries['top_plans']"
            >
                
            </x-dashboard.raking>
        </x-dashboard.fast-checkout>
    </section>
@endsection