@extends('layouts.main')


@section('title', 'Definições')


@section('content')
    <section id="user-container">
        <x-dashboard.content>
            <x-dashboard.title-section>
                Usuários
            </x-dashboard.title-section>

            <x-dashboard.main-table>
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
        </x-dashboard.content>
        <x-dashboard.float-btn :rota="route('users.create')" >
            +
        </x-dashboard.float-btn>
    </section>
@endsection    


