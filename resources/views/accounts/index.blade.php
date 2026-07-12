@extends('layouts.main')

@section('title', 'QManager - Contas')

@section('content')
<x-dashboard.alert />
    <section id="index-container" >
       <x-dashboard.content>
            <x-dashboard.title-section>
                Contas
            </x-dashboard.title-section> 

    
            <x-dashboard.main-table class="md:mb-4">
                <x-dashboard.table>
                    <x-slot:thead>
                        <th>ID</th>
                        <th>Conta</th>
                        <th>Número da conta</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </x-slot:thead>
                    
                    <x-slot:body>
                     
                        @foreach ($accounts as $account) 
                             <tr>
                                 <td  @class(['text-zinc-600' => !$account->is_active])>{{ $loop->index + 1 }} </td>
                                 <td @class(['text-zinc-600' => !$account->is_active])>{{ $account->name }} </td>
                                 <td @class(['text-zinc-600' => !$account->is_active])>{{ $account->number_account }} </td>
                                 <td @class(['text-zinc-600' => !$account->is_active])>{{ $account->type }} </td>
                                 <td>
                                     <x-dashboard.action-btn 
                                        type="link" 
                                        href="{{ route('accounts.edit', ['account' => $account->id]) }}" 
                                        class="bg-green-800 mr-2.5"
                                     >
                                         Editar
                                     </x-dashboard.action-btn>

                                     <form action="{{ route('accounts.destroy', ['account' => $account->id]) }}" method="POST" class="inline">
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
                                     
                                        <x-dashboard.action-btn
                                            type="link"
                                            href="{{ route('accounts.show', ['account' => $account->id]) }}" class="ver-mais-accounts bg-blue-600"
                                        >
                                            Ver Mais
                                        </x-dashboard.card-btn>
                                 </td>
                             </tr>
                        @endforeach
                       
                    </x-slot:body>
                </x-dashboard.table>

            </x-dashboard.main-table>
            {{ $accounts->links() }}
       </x-dashboard.content>
       <x-dashboard.float-btn 
           bottom="2"
           :rota="route('accounts.create')"
           class="bg-blue-600 bottom-8"
           type="a"
       >
           <i class="fa-solid fa-plus"></i>
       </x-dashboard.float-btn> 
    </section>
@endsection  