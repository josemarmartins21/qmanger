@use('Illuminate\Support\Facades\Auth')
@extends('layouts.main')


@section('title', 'Definições')


@section('content')
    <section id="user-container">
        <x-dashboard.content>
            <x-dashboard.title-section>
                Usuários
            </x-dashboard.title-section>

            <x-dashboard.main-table class="md:mb-4">
                <x-dashboard.table>
                    <x-slot:thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                     
                        @foreach ($users as $user) 
                             <tr>
                                 <td>{{ $user->id }} </td>
                                 <td @class(['text-green-900 font-bold' => $user->is_master])>{{ $user->name }} </td>
                                 <td>{{ $user->email }} </td>
                                 <td>
                                     <x-dashboard.action-btn type="link" href="{{ route('users.edit', $user->id) }}" class="bg-green-800 mr-2.5">
                                         Editar
                                     </x-dashboard.action-btn>

                                     <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                         @csrf
                                         @method('DELETE')
                                         @if (!$user->is_master) 
                                            <x-dashboard.action-btn type="button"  class="bg-red-800 mr-2.5 " onclick="return alert('Tem certeza que pretende excluir?')">
                                                Delete
                                            </x-dashboard.action-btn>
                                         @endif
                                     </form>
                                     
                                     <x-dashboard.action-btn type="link" href="{{ route('users.show', $user->id) }}" class="bg-blue-600">
                                         Ver Mais
                                     </x-dashboard.action-btn>
                                 </td>
                             </tr>
                        @endforeach
                       
                    </x-slot:body>
                </x-dashboard.table>

            </x-dashboard.main-table>
            {{ $users->links() }}
        </x-dashboard.content>
        <x-dashboard.float-btn :rota="route('users.create')" >
            +
        </x-dashboard.float-btn>

    </section>
@endsection    


