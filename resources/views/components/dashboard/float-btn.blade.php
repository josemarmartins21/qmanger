@props([
    'bottom' => 8,
    'rota' => ''
])

<a href="{{ $rota }}"   id="float-btn" {{ $attributes->merge(['class' => 'bottom-' . $bottom]) }}>
    {{ $slot }}
</a>