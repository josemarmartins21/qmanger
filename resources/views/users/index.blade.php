@use('Illuminate\Support\Facades\Auth')
@extends('layouts.main')


@section('title', 'Usuários')
@section('section', 'Usuários')


@section('content')
<x-dashboard.alert />
    <section id="index-container">
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
                                 <td @class(['font-extrabold' => $user->is_master])>{{ $user->name }} </td>
                                 <td>{{ $user->email }} </td>
                                 <td>
                                     <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                         @csrf
                                         @method('DELETE')
                                         @if (!$user->is_master) 
                                            <x-dashboard.action-btn type="button"  class="bg-red-800 mr-2.5 " onclick="return confirm('Tem certeza que pretende excluir?')">
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
        <x-dashboard.float-btn 
            :rota="route('register')" 
            class="bg-blue-600"
            type="a"
        >
            <i class="fa-solid fa-plus"></i>
        </x-dashboard.float-btn>

    </section>
@endsection    


