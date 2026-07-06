@extends('layouts.main')

@section('title', 'QManager - Planos')


@section('content')
    <section id="index-container">
       <x-dashboard.content>
            <x-dashboard.title-section>
                Planos
            </x-dashboard.title-section>

            <x-dashboard.cards-container>
                    @forelse ($plans as $plan) 
                        <x-dashboard.card 
                            :data="$plan"
                        >
                            <x-slot:header>
                                <h3 class="text-2xl font-semibold">{{ $plan->name }}</h3>
                            </x-slot:header>
    
                            <x-slot:body>
                                <ul>
                                    <li class="text-3xl mb-1  text-zinc-100">{{ number_format($plan->price, 2, ',', '.') }}Kz</li>
                                    <li class="text-zinc-400">{{ $plan->velocity_download }}Mbps </li>
                                </ul>
                            </x-slot:body>
    
                            <x-slot:footer>
                                <x-dashboard.card-btn 
                                    class="ver-mais-plano 
                                    bg-blue-600"
                                >
                                    Ver Mais
                                </x-dashboard.card-btn>
    
                                <x-dashboard.action-btn-container>
                                    <x-dashboard.action-btn 
                                        type="link" 
                                        class="bg-green-700"
                                        href="{{ route('plans.edit', ['plan' => $plan->id]) }}"
                                    >
                                        <i class="fa-solid fa-edit text-xl"></i>
                                    </x-dashboard.action-btn>
    
                                    <form action="{{ route('plans.destroy', ['plan' => $plan->id]) }}" 
                                        method="POST" >

                                        @csrf
                                        @method('Delete')

                                        <x-dashboard.action-btn onclick="return confirm('Tem a certeza que pretende eliminar?')" class="bg-red-700">
                                            <i class="fa-solid fa-trash text-xl"></i>
                                        </x-dashboard.action-btn>
                                    </form>
                                </x-dashboard.action-btn-container>
                            </x-slot:footer>
                        </x-dashboard.card>
                    @empty 
                    
                    @endforelse
            </x-dashboard.cards-container>
            {{ $plans->links() }}
       </x-dashboard.content>
              <x-dashboard.modal>
            <div class="p-6 bg-zinc-900 text-zinc-100 rounded-md">
                <header class="mb-4 border-b border-zinc-800 pb-3">
                    <h2 id="modal-title" class="text-2xl font-semibold"></h2>
                </header>

                <div class="space-y-3">
                    <ul class="grid grid-cols-1 gap-2 text-zinc-300">
                        <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                            <span class="font-medium">Preço</span>
                            <span id="modal-price" class="text-zinc-100 font-semibold"></span>
                        </li>

                        <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                            <span class="font-medium">Velocidade</span>
                            <span id="modal-velocity" class="text-zinc-100 font-semibold"></span>
                        </li>

                        <li class="flex justify-between items-center px-3 py-2 bg-zinc-800 rounded">
                            <span class="font-medium">Registrado por</span>
                            <span id="modal-user" class="text-zinc-100 font-semibold"></span>
                        </li>
                    </ul>

                    <div class="mt-2 text-zinc-300">
                        <h3 class="text-lg font-medium mb-1">Descrição</h3>
                        <p id="modal-description" class="text-sm leading-relaxed"></p>
                    </div>
                </div>

                <footer class="mt-5 flex justify-end">
                    <button type="button" class="px-4 py-2 bg-red-700 hover:opacity-100 md:opacity-80 text-zinc-100 rounded" id="close-modal-btn">
                        Fechar
                    </button>
                </footer>
            </div>
       </x-dashboard.modal>

    <x-dashboard.float-btn 
        bottom="2"
        :rota="route('plans.create')"
        type="a"
        class="bg-blue-600"
    >
        +
    </x-dashboard.float-btn> 
    </section>
@endsection  