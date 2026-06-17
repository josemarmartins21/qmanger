@props(['active' => ''])

<a 
    {{ $attributes }} 
    @class([
            'link-active' => $active, 
            'link-nav', 
            'link-desativado' => !$active,
        ])
    >
    {{ $slot }}
</a>