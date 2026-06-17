@extends('layouts.main')    

@section('title', 'Dashboard')

@section('content')
    <section id="principal">
        <x-dashboard.content>
            <x-dashboard.overview>
                <x-dashboard.title-overview title="Resumo" />

                <x-dashboard.cards-overview>    
                    <x-dashboard.card-overview>
                        <span>Lorem, ipsum.</span>
                        <h3>150</h3>
                        <p>Lorem ipsum dolor sit.</p>
                    </x-dashboard.card-overview>
                    
                    <x-dashboard.card-overview>
                        <span>Lorem, ipsum.</span>
                        <h3>150</h3>
                        <p>Lorem ipsum dolor sit.</p>
                    </x-dashboard.card-overview>
                    
                    <x-dashboard.card-overview>
                        <span>Lorem, ipsum.</span>
                        <h3>150</h3>
                        <p>Lorem ipsum dolor sit.</p>
                    </x-dashboard.card-overview>
                    
                    <x-dashboard.card-overview>
                        <span>Lorem, ipsum.</span>
                        <h3>150</h3>
                        <p>Lorem ipsum dolor sit.</p>
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
                description="Description Description"
                title="Raking"
            >
                
            </x-dashboard.raking>
        </x-dashboard.fast-checkout>
    </section>
@endsection