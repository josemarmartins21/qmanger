@extends('layouts.main')

@section('title', 'QManager - Clientes')

@section('content')
    <section id="index-container">
       <x-dashboard.content>
            <x-dashboard.title-section>
                Clientes
            </x-dashboard.title-section> 

    
            <x-dashboard.main-table class="md:mb-4">
                <x-dashboard.table>
                    <x-slot:thead>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                     
                        @foreach ($contacts as $contact) 
                             <tr>
                                 <td>{{ $contact->id }} </td>
                                 <td>{{ $contact->first_name . ' '. $contact->last_name }} </td>
                                 <td>{{ $contact->phone }} </td>
                                 <td>{{ $contact->email }} </td>
                                 <td>{{ $contact->bairro . ' - ' . $contact->municipio }} </td>
                                 <td>
                                     <x-dashboard.action-btn type="link" href="{{ route('contacts.edit', $contact->id) }}" class="bg-green-800 mr-2.5">
                                         Editar
                                     </x-dashboard.action-btn>

                                     <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                                        @csrf

                                        @method('DELETE')

                                        <x-dashboard.action-btn type="button"  class="bg-red-800 mr-2.5 " onclick="return alert('Tem certeza que pretende excluir?')">
                                            Delete
                                        </x-dashboard.action-btn>
                                     </form>
                                     
                                     <x-dashboard.action-btn type="link" href="{{ route('contacts.show', $contact->id) }}" class="bg-blue-600">
                                         Ver Mais
                                     </x-dashboard.action-btn>
                                 </td>
                             </tr>
                        @endforeach
                       
                    </x-slot:body>
                </x-dashboard.table>

            </x-dashboard.main-table>
            {{ $contacts->links() }}
       </x-dashboard.content>
       <x-dashboard.float-btn 
           bottom="2"
           :rota="route('contacts.create')"
       >
           +
       </x-dashboard.float-btn> 
    </section>
@endsection  