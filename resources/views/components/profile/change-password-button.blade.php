@props([
    'userId' => null,
    'action' => '#',
])

<button 
    type="button" 
    onclick="document.getElementById('changePasswordModal').classList.remove('hidden')"
    {{ $attributes->merge(['class' => 'px-2 py-2 bg-white text-black font-semibold rounded-lg shadow-md hover:shadow-lg']) }}
>
    <span class="ml-2">Alterar Senha</span>
</button>
