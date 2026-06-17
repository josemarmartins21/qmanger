<select {{ $attributes->merge(['class' => 'outline-2 p-2 outline-zinc-400 rounded-xs focus:outline-zinc-900']) }}  >
    {{ $slot }}
</select>