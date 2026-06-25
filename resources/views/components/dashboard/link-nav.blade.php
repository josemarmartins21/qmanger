@props(['active' => false])

<a 
    {{ $attributes }} 
    @class([
            'link-active' => $active, 
            'link-nav', 
            'text-zinc-600 dark:text-zinc-300 border-[3px] border-[var(--destaque)]' => !$active,
        ])
    >
    {{ $slot }}
</a>