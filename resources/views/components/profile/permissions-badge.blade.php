@props([
    'user' => null,
])




<div class="space-y-6">
    <p class="font-semibold text-2xl tracking-wide mb-3 pt-2">Nível de Permissão</p>
    <div class="flex flex-wrap gap-2">
        @if($user?->load('permissions')['permissions'] && count($user->load('permissions')['permissions']))
            @foreach($user->load('permissions')['permissions'] as $role)
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 text-sm font-semibold rounded-lg border border-blue-300">
                    {{ $role->name }}
                </span>
            @endforeach
        @else
            <span class="inline-block px-4 py-2 bg-gray-100 text-gray-800 text-sm font-semibold rounded-lg border border-gray-300">
                Sem permissões
            </span>
        @endif
    </div>
</div>
