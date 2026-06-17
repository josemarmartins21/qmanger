@extends('layouts.main')


@section('title', 'Criar')


@section('content')
    <x-dashboard.float-btn 
        :rota="route('create')"
    >
        +
    </x-dashboard.float-btn> 

    <section id="index-container">
       <x-dashboard.content>
            <x-dashboard.title-section>
                Produtos
            </x-dashboard.title-section>

            <x-dashboard.cards-container>
                @for ($i=0;$i < 6;$i++) 
                    <x-dashboard.card>
                        <x-slot:header>
                            <h3>Produto 1</h3>
                        </x-slot:header>
    
                        <x-slot:body>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, optio?</p>
                        </x-slot:body>
    
                        <x-slot:footer>
                            <x-dashboard.card-btn class="bg-blue-600">
                                Ver Mais
                            </x-dashboard.card-btn>
    
                            <x-dashboard.action-btn-container>
                                <x-dashboard.action-btn class="bg-green-700">
                                    <i class="fa-solid fa-edit text-xl"></i>
                                </x-dashboard.action-btn>
    
                                <x-dashboard.action-btn class="bg-red-700">
                                    <i class="fa-solid fa-trash text-xl"></i>
                                </x-dashboard.action-btn>
                            </x-dashboard.action-btn-container>
                        </x-slot:footer>
                    </x-dashboard.card>
                @endfor
            </x-dashboard.cards-container>

       </x-dashboard.content>
    </section>
@endsection  