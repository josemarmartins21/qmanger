@props([
    'user' => null,
])

<div class="space-y-4">
    <div class="flex flex-row gap-2">
        <p class="font-medium tracking-wide">Nome:</p>
        <p class="font-bold">{{ $user?->name ?? 'N/A' }}</p>
    </div>
    
    <div class="flex flex-row gap-2">
        <p class="font-medium  tracking-wide">Email:</p>
        <p class="break-all">{{ $user?->email ?? 'N/A' }}</p>
    </div>
    
    <div class="flex flex-row gap-2">
        <p class="font-medium  tracking-wide">Membro desde:</p>
        <p class="font-bold">
            @if($user?->created_at)
                {{ $user->created_at->format('d/m/Y') }}
            @else
                N/A
            @endif
        </p>
    </div>
</div>
