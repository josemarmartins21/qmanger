@props([
    'user' => null,
    'size' => 'lg',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'w-12 h-12 text-sm',
        'md' => 'w-16 h-16 text-base',
        'lg' => 'w-24 h-24 text-2xl',
        default => 'w-24 h-24 text-2xl',
    };
    
    $initials = collect(explode(' ', $user?->name ?? 'U'))
        ->map(fn($word) => strtoupper($word[0]))
        ->take(2)
        ->join('');
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center justify-center ' . $sizeClasses . ' rounded-full bg-slate-600 text-white font-bold overflow-hidden border-4 border-white shadow-lg']) }}>
    @if($user?->avatar)
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
    @else
        <span>{{ $initials }}</span>
    @endif
</div>
