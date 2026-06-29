@use('Illuminate\Support\Facades\Auth')
@use('App\Helpers\DateHelper')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])    

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body id="corpo">
    <header>
        <div id="logo">
            <img src="{{ asset('images/icones/qos-logo-sem-fundo.png') }}" alt="Logo do sistema" >
            
            <div id="barra-divisao"></div>

            <h1 class="text-5xl font-bold">QManager</h1>
        </div>

        <div id="data-actual">
            <p>{{ DateHelper::currentExtendedDate() }}</p>
        </div>
    </header>
    <main>
        <section id="side-bar">
            <div id="image-account">
                <img src="{{ asset('images/account/josemar.png') }}" alt="">
                <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="md:hover:underline">{{ Auth::user()->name }}</a>
            </div>

            <nav>
                <x-dashboard.link-nav-container>
                    <x-dashboard.link-nav href="{{ route('home') }}"
                        :active="request()->routeIs('home')"
                    >
                        Home
                    </x-dashboard.link-nav>
                    <x-dashboard.link-nav 
                        href="{{ route('plans.index') }}"
                        :active="request()->routeIs('plans.index') || request()->routeIs('plans.create') || request()->routeIs('plans.edit')" 
                    >
                        Planos
                    </x-dashboard.link-nav>
                    @can ('super-admin') 
                        <x-dashboard.link-nav 
                        href="{{ route('users.index') }}"
                        :active="request()->routeIs('users.index') || request()->routeIs('users.create')
                        || request()->routeIs('users.edit') || request()->routeIs('users.show')
                        "
                        >
                        Gerir Usuários
                    </x-dashboard.link-nav>
                    @endcan
                    @can ('admin') 
                        <x-dashboard.link-nav 
                        href="{{ route('users.index') }}"
                        :active="request()->routeIs('users.index') || request()->routeIs('users.create')
                        || request()->routeIs('users.edit') || request()->routeIs('users.show')
                        "
                        >
                        Gerir Usuários
                    </x-dashboard.link-nav>
                    @endcan
                <x-dashboard.link-nav 
                    href="{{ route('settings') }}"
                    :active="request()->routeIs('settings')"
                >
                    Definições
                </x-dashboard.link-nav>
                </x-dashboard.link-nav-container>
            </nav>
        
            <div id="logout-btn">
                
                <form action="{{ route('logout') }}" method="POST">
                    <button type="submit" onclick="return alert('Tem a certeza que deseja terminar a sessão?')">
                        @csrf


                        <i class="fa-solid fa-right-from-bracket"></i>  Sair
                    </button>
                </form>
            </div>
    </section>
    
        @yield('content')
    </main>
    <script src="{{ asset('js/script.js') }}"></script>      
</body>
</html>