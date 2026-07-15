@use('App\Models\User')
@extends('layouts.main')

@section('title', 'QManager - Clientes')
@section('section', 'Clientes')

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
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                     
                        @foreach ($contacts as $contact) 
                             <tr class="table-line" data-contact='@json($contact)' data-user='@json(User::find($contact->user_id))' >
                                 <td>{{ $loop->index + 1 }} </td>
                                 <td>{{ $contact->first_name . ' '. $contact->last_name }} </td>
                                 <td>{{ $contact->phone }} </td>
                                 <td>{{ $contact->email }} </td>
                                 <td>{{ $contact->bairro . ' - ' . $contact->municipio }} </td>
                                 <td>
                                     <x-dashboard.action-btn 
                                        type="link" 
                                        href="{{ route('contacts.edit', ['contact' => $contact->contact_id]) }}" 
                                        class="bg-green-800 mr-2.5"
                                     >
                                         Editar
                                     </x-dashboard.action-btn>

                                     <form action="{{ route('contacts.destroy', ['contact' => $contact->contact_id]) }}" method="POST" class="inline">
                                        @csrf

                                        @method('DELETE')

                                        <x-dashboard.action-btn 
                                            type="button"  
                                            class="bg-red-800 mr-2.5 " 
                                            onclick="return confirm('Tem certeza que pretende excluir?')"
                                        >
                                            Delete
                                        </x-dashboard.action-btn>
                                     </form>
                                     
                                        <x-dashboard.card-btn    class="ver-mais-contact bg-blue-600">
                                            Ver Mais
                                        </x-dashboard.card-btn>
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
           class="bg-blue-600 bottom-8"
           type="a"
       >
           <i class="fa-solid fa-plus"></i>
       </x-dashboard.float-btn> 
    </section>
        <x-dashboard.modal>
                <div class="p-6 bg-zinc-900 text-zinc-100 rounded-md">
                    <header class="mb-4 border-b border-zinc-800 pb-3">
                        <h2 id="modal-title" class="text-2xl font-semibold"></h2>
                    </header>

                    <div class="space-y-3">
                        <ul class="grid grid-cols-1 gap-2 text-zinc-300">
                            <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                                <span class="font-medium">Telefone</span>
                                <span id="modal-phone" class="text-zinc-100 font-semibold"></span>
                            </li>

                            <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                                <span class="font-medium">Email</span>
                                <span id="modal-email" class="text-zinc-100 font-semibold"></span>
                            </li>

                            <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                                <span class="font-medium">Registrado por</span>
                                <span id="modal-user" class="text-zinc-100 font-semibold"></span>
                            </li>

                            <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                                <span class="font-medium">Bairro/Município</span>
                                <span id="modal-bairro" class="text-zinc-100 font-semibold"></span>
                            </li>

                            <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                                <span class="font-medium">Rua</span>
                                <span id="modal-street" class="text-zinc-100 font-semibold"></span>
                            </li>

                        </ul>

                        <div class="mt-2 text-zinc-300">
                            <h3 class="text-lg font-medium mb-1">Indicações</h3>
                            <p id="modal-indicacoes" class="text-sm leading-relaxed"></p>
                        </div>
                    </div>

                    <footer class="mt-5 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-red-700 hover:opacity-100 md:opacity-80 text-zinc-100 rounded" id="close-modal-btn">
                            Fechar
                        </button>
                    </footer>
                </div>
        </x-dashboard.modal>
@endsection  